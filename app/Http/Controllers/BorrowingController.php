<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BorrowingController extends Controller
{
    public function index(): View
    {
        $borrowings = Borrowing::query()
            ->with(['member', 'user', 'details.book'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    public function create(): View
    {
        $members = Member::query()->orderBy('name')->get();
        $books = Book::query()->orderBy('title')->get();

        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        /** @var Book $book */
        $book = Book::query()->findOrFail($request->input('book_id'));
        $quantity = (int) $request->input('quantity');

        if ($book->stock < $quantity) {
            return back()
                ->withErrors(['quantity' => 'Stok buku tidak mencukupi.'])
                ->withInput();
        }

        /** @var Borrowing $borrowing */
        $borrowing = Borrowing::query()->create([
            'user_id' => Auth::id(),
            'member_id' => $request->input('member_id'),
            'borrowing_date' => now()->toDateString(),
            'due_date' => now()->addDays(7)->toDateString(),
            'status' => 'borrowed',
        ]);

        $borrowing->details()->create([
            'book_id' => $book->id,
            'quantity' => $quantity,
        ]);

        $book->decrement('stock', $quantity);

        return redirect()->route('borrowings.index')
            ->with('success', 'Transaksi peminjaman berhasil disimpan dan stok buku diperbarui.');
    }

    public function returnBook(Borrowing $borrowing): RedirectResponse
    {
        if ($borrowing->status === 'returned') {
            return back()->with('success', 'Buku pada transaksi ini sudah dikembalikan sebelumnya.');
        }

        $borrowing->update([
            'return_date' => now()->toDateString(),
            'status' => 'returned',
        ]);

        foreach ($borrowing->details as $detail) {
            if ($detail->book) {
                $detail->book->increment('stock', $detail->quantity);
            }
        }

        return redirect()->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan dan stok bertambah.');
    }
}

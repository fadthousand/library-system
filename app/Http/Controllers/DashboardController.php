<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Member;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalCategories = Category::query()->count();
        $totalBooks = Book::query()->count();
        $totalMembers = Member::query()->count();
        $totalBorrowings = Borrowing::query()->count();
        $activeBorrowings = Borrowing::query()->where('status', 'borrowed')->count();

        return view('dashboard.index', compact(
            'totalCategories',
            'totalBooks',
            'totalMembers',
            'totalBorrowings',
            'activeBorrowings'
        ));
    }
}

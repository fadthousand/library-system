<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $title = 'Library System Dashboard';
        $description = 'Selamat datang di Sistem Informasi Perpustakaan.';
        $total_books = 5;
        $total_categories = 5;
        $total_members = 5;

        return view('dashboard.index', compact('title', 'description', 'total_books', 'total_categories', 'total_members'));
    }
}

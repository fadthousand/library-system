<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = [
            'Andi',
            'Budi',
            'Citra',
            'Dewi',
            'Eko'
        ];

        return view('members.index', compact('members'));
    }
}

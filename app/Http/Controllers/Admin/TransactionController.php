<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', Admin::class]);
    }

    public function index()
    {
        $transactions = Transaction::latest()->paginate(50);
        return view('admin.transactions.index', compact('transactions'));
    }
}

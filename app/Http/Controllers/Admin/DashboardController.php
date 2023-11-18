<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       /* $plan = Plan::find(auth()->user()->plan_id);
        abort_if(!$plan->isPurchased(), 403);*/
        return view('admin.dashboard'/*, compact('plan')*/);
    }
}

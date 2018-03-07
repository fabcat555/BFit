<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Instructor;
use App\Athlete;
use App\Membership;
use App\MembershipType;

use Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
        return view('admin.dashboard')->with([
            'admin' => Auth::guard('admin')->user(),
            'instructors' => Instructor::take(5)->get(),
            'athletes' => Athlete::take(5)->get(),
            'membershipTypes' => MembershipType::take(5)->get(),
            'memberships' => Membership::take(5)->get()
        ]);
    }
}

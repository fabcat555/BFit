<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

use App\Http\Requests\MembershipCreateForm;

use App\Athlete;
use App\MembershipType;
use App\Membership;

class MembershipsController extends Controller
{
    public function __construct() {
        return $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.memberships.index')->with('memberships', Membership::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.memberships.create')->with([
            'athletes' => Athlete::all(),
            'membershipTypes' => MembershipType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembershipCreateForm $request)
    {
        $membershipTypeId = $request->get('type_id');
        $membershipType =  MembershipType::find($membershipTypeId);

        Membership::create([
            'athlete_id' => $request->get('athlete_id'),
            'type_id' => $membershipTypeId,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($membershipType->validity)
            
        ]);

        return redirect(route('memberships.index'))->with('status', __('messages.CreatedMembership'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        return view('admin.memberships.show')->with('membership', $membership);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        return view('admin.memberships.edit')->with('membership', $membership);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        $membership->fill($request->all());

        return redirect(route('memberships.index'))->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        $membership->end_date = Carbon::now();
        $membership->save();

        request()->session()->flash('status', __('messages.DeletedResource'));
        return response()->json(['status' => 'ok']);
    }

    public function viewReport() {
        return view('admin.memberships.report')->with('report', $this->getReport());
    }
    
    public function getReport($timeRange = 'week') {
        switch($timeRange) {
            case 'week':
            default: 
                $date = Carbon::now()->subDays(7);
                break;
            case 'month':
                $date = Carbon::now()->subMonth();
                break;
            case 'year':
                $date = Carbon::now()->subYear();
                break;
        }

        $membershipsPerPeriod = DB::table('memberships')
                    ->select(DB::raw('count(*) as subscriptions, type_id'))
                    ->where('start_date', '>', $date)
                    ->groupBy('type_id')
                    ->orderBy('type_id')
                    ->get();

        $report = [];
        
        foreach($membershipsPerPeriod as $result) {
            $report[MembershipType::find($result->type_id)->name] = $result->subscriptions;
        }
        
        return $report;
    }
}

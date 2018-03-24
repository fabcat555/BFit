<?php

namespace App\Http\Controllers\Admin;

use App\MembershipType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\MembershipTypeCreateForm;

class MembershipTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.membership-types.index')->with('membershipTypes', MembershipType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembershipTypeCreateForm $request)
    {
        MembershipType::create($request->all());

        return redirect(route('membership-types.index'))->with('status', __('messages.CreatedMembershipType'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipType $membershipType)
    {
        return view('admin.membership-types.show')->with('membershipType', $membershipType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function edit(MembershipType $membershipType)
    {
        return view('admin.membership-types.edit')->with('membershipType', $membershipType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembershipType $membershipType)
    {
        $membershipType->fill($request->only(['name', 'validity', 'price']))->save();

        return redirect(route('membership-types.index'))->with('status', __('messages.UpdatedResource'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembershipType $membershipType)
    {
        $membershipType->delete();

        request()->session()->flash('status', __('messages.DeletedResource'));
        return response()->json(['status' => 'ok']);
    }
}

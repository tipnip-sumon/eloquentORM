<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Contact;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::whereAge(13)
                ->with('contact:email as Email,mobile as Mobile,address,city,member_id')
                ->get();
        return $member;
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $member = Member::create([
            'name' => 'Samiul Islam Rafi',
            'age' => '12',
            'gender' => 'male'
        ]);
        $member->contact()->create([
            'email' => 'rafi22@gmail.com',
            'mobile' => '01787909190',
            'address' => 'Harati',
            'city' => 'Dhaka'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        echo "Hi";
        // dd($request->all());
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    public function login(Request $request)
    {
        return view('login');

    }
    public function loginCheck(Request $request)
    {
        // dd($request->all());
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('status','Unsuccessfully.');
        }

    }
    public function dashboardPage()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'f_name' => 'required',
            'email' =>'required|email',
            'age' =>'required',
            'role' => 'required',
            'password'=> 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $members = Member::create([
            'name' => $request->f_name,
            'email' => $request->email,
            'age' => $request->age,
            'role' => $request->role,
            'password'=>$request->password
        ]);
        if($members){
            return redirect()->route('member.index')->with('status','Successfully Registered.');
        }else{
            return redirect()->route('member.index')->with('status','Successfully Not Registered.');
        }
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
    public function update(Request $request, Member $member)
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

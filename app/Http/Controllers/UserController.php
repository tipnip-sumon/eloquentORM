<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //chunkById use for update
        // User::where('id',1)->chunkById(2,function($user){
        //     $user->each->update(['email'=>'sumon@gmail.com']);
        // });

        //lazyById use for update
        $users = User::where('id',2)->lazyById(3)->each->update(['name'=>'Samiul Islam Rafi']);


        // User::chunk(3,function($user){
        //     echo $user;
        // });
        
        // $user = User::where('email','sumonmti498@gmail.com')->toRawSql();
    //    User::chunk(3,function($users){
    //         foreach($users as $user){
    //             echo $user->name;
    //         }
    //         echo "<br>";
    //     });
    // foreach(User::lazy() as $users){
    //     echo $users;
    //     foreach($users as $user){
    //         echo $user;
    //     }
    //     echo "<br>";
    // }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::updateOrCreate(
            ['email'=>$request->email],
            [
            'name'=>$request->f_name,
            'password'=>$request->password
            ]);
        if($user){
            return redirect()->route('user.create')->with('status','Updated Successfully.');
        }
        // if(User::where('email','=',request()->get('email'))->exists()){
        //     return redirect()->route('user.create')->with('status','Updated Successfully.');
        // }else{
        //     return redirect()->route('user.create')->with('status','Registration Successfully.');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

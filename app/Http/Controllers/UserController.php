<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{

    public function login(Request $request)
    {
        
        return view('login'); 

    }
    public function loginCheck(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            return response()->json([
                'status'=>'Success',
                'message'=>'Successfully login.'
            ],200);

            // return redirect()->route('dashboard');
        }else{
            // return redirect()->back();
            return response()->json([
                'status'=>'Failed',
                'message'=>'Unsuccessfully.'
            ],200);
        }

    }
    public function ViewProfile(int $pid)
    {
        Gate::authorize('view-profile',$pid);
        $user = User::find($pid);
        return view('profile',compact('user'));
    }
    public function dashboardPage()
    {
        // if(Gate::allows('isAdmin')){
        //     return "Your are admin";
        // }else{
        //     return "Access denied";
        // }
        // Gate::authorize('isAdmin');
        if(Auth::check()){
            $posts = Post::all();
            return view('dashboard',compact('posts'));
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
        try {
            // $request->validate([
            //     'f_name' => 'required',
            //     'email' =>'required|email',
            //     'age' =>'required',
            //     'role' => 'required',
            //     'password'=> 'required',
            //     'password_confirmation' => 'required|same:password'
            // ]);
            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'role' => $request->role,
                'password'=>$request->password
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Successfully Registered.'
            ],200);
            // if($users){
            //     return redirect()->route('user.index')->with('status','Successfully Registered.');
            // }else{
            //     return redirect()->route('user.index')->with('status','Successfully Not Registered.');
            // }
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>'failed',
                'message'=>$th
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(User $user)
    {
        Auth::logout();
        return redirect('/login'); 
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // $users = User::get();
    //     // $users = User::with('post')->get();
    //     // $users = User::with('post:title,description,user_id')->find(1,['name','id']);

    //     // $users = User::find(1);
    //     // $posts = $users->post;

    //     // $users = User::doesntHave('post')->get();
    //     // $users = User::has('post')->get();
    //     // $users = User::has('post')->with('post')->get();
    //     // $users = User::has('post','<',3)->with('post')->get();
    //     // $users = User::withCount('post')->get();
    //     $users = User::with('post','contact')->get();
    //     return  response()->json($users);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //First method
    //     $user = User::find(1);
    //     $user->post()
    //     ->createMany([
    //             [
    //             'title' => 'Post title test create 223',
    //             'description' => 'Description create 223'
    //             ],
    //             [
    //             'title' => 'Post title test create 224',
    //             'description' => 'Description create 224'
    //             ],
    //             [
    //             'title' => 'Post title test create 225',
    //             'description' => 'Description create 225'
    //             ]
    //         ]);
    //         $user->contact()->create([
    //             'mobile'=>'01787909190',
    //             'city' => 'Dhaka',
    //             'country' => 'Bangladesh'
    //         ]);
    //     //2nd method
    //     // $user = User::create([
    //     //     'name' => 'Rafsan Al Raian',
    //     //     'email' => 'rafsan4@gmail.com'
    //     // ]);
    //     // $user->post()->createMany([
    //     //     [
    //     //         'title' => 'title 3',
    //     //         'description' => 'description 3'
    //     //     ],
    //     //     [
    //     //         'title' => 'title 4',
    //     //         'description' => 'description 4'
    //     //     ],
    //     // ]);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(User $user)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(User $user)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, User $user)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(User $user)
    // {
    //     //
    // }
}

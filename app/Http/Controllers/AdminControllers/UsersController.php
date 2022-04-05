<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Models\User;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                return view('login');
    }


    /**
     * Display register view
     * @return \Illuminate\Http\Response;
     */
    public function viewRegister(){
        return view('Signin');
    }
    /**
     *  for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Validator::validate($request->all(),[
            'username'=>['string','required','min:3','max:10','unique:users,name'],
            'email'=>['email','required','min:3','unique:users,email'],
            'password'=>['required','min:5']


        ],[
            'username.required'=>'This field is required',
            'password.min'=>'Can not be less than 3 letters', 
            'email.unique'=>'There is an email in the table',
        ]);

        $user=new User();
        $user->name=$request->input('username');
        $user->email=$request->input('email');
        $user->password= Hash::make($request->password);
        if($user->save())
        return redirect()->route('/')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

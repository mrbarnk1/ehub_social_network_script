<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class API extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function username($name = NULL) {
        if ($name != NULL) {
            if(empty($name) || strlen($name) < 4) {
                $data['status'] = 'danger';
                $data['message'] = '&nbsp;&nbsp;&nbsp;Username must not be empty <i class="fa fa-times"></i>';
            }elseif(\App\User::where('user_name', $name)->count() == '0') {
                $data['status'] = 'success';
                $data['message'] = '&nbsp;&nbsp;&nbsp;Username does not exist <i class="fa fa-check"></i>';
            }else {
                $data['status'] = 'danger';
                $data['message'] = '&nbsp;&nbsp;&nbsp;Username exists in our database <i class="fa fa-times"></i>';
            }
            return json_encode($data);
        }
    }
    public function email($name = NULL) {
        $arr['email'] = $name;
        // return $name;
        // return ;
        if ($name != NULL) {
            // return \Validator::make($arr,['email' => ['required', 'email', 'max:255']])->messages();
            if(\Validator::make($arr,['email' => ['required', 'email', 'max:255']])->fails()) {
                $data['status'] = 'danger';
                $data['message'] = '&nbsp;&nbsp;&nbsp;Email is not valid <i class="fa fa-times"></i>';
            }elseif(\App\User::where('email', $name)->count() == '0') {
                $data['status'] = 'success';
                $data['message'] = '&nbsp;&nbsp;&nbsp;Email does not exist <i class="fa fa-check"></i>';
            }else {
                $data['status'] = 'danger';
                $data['message'] = '&nbsp;&nbsp;&nbsp;Email exists in our database <i class="fa fa-times"></i>';
            }
            return json_encode($data);
        }
    }

    public function getmyuserdata($id)
    {
        // if (session()->has('id')) {
            return json_decode(\App\User::all());
        /*"[
          {username: 'lodev09', fullname: 'Jovanni Lo'},
          {username: 'foo', fullname: 'Foo User'},
          {username: 'bar', fullname: 'Bar User'},
          {username: 'twbs', fullname: 'Twitter Bootstrap'},
          {username: 'john', fullname: 'John Doe'},
          {username: 'jane', fullname: 'Jane Doe'},
        ];";//\App\User::all();
        */
        // }else {
        //     return view('auth.register');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

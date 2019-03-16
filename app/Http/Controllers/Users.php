<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Users extends Controller
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
        // return $request->all();

        $val = \Validator::make($request->all(), [
                'user_name' => ['required', 'max:255', 'alpha_dash', 'unique:users,user_name'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'mob' => ['required', 'string', 'max:255'],
                'dob' => ['required', 'string', 'max:255'],
                'yob' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:7'],
            ]);
        // return $val->messages();
        if($val->fails()) {
            return 'Empty form';
            // return $val->messages();
        }
        // return 'ok';
        $ver = uniqid($request->user_name, true);
        if(User::create([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'mob' => $request->mob,
            'yob' => $request->yob,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country,
            'passwords' => \Illuminate\Support\Facades\Hash::make($request->password),
            'email' => $request->email,
            'is_verified' => '0',
            'is_admin' => '0',
            'verification_code' => $ver
        ])) {
            return 'ok';
        }
    }
    public function logins(Request $request)
    {
        // return 'ok';
        if(\Validator::make($request->all(), [
            'user_name' => ['required', 'max:255', 'alpha_dash'],
            'password' => ['required']
        ])->fails()) {
            return 'Username and password is required';
        }else {
             $obj = $this->loginuser($request->all());

                if($obj->count() == 1) {
                    foreach ($obj as $keyvalue) {
                        $id = $keyvalue->id;
                        $password = $keyvalue->passwords;
                        $first_name = $keyvalue->first_name;
                        $last_name = $keyvalue->last_name;
                        $user_name = $keyvalue->user_name;
                        $email = $keyvalue->email;
                        $status = $keyvalue->status;
                        $is_admin = $keyvalue->is_admin;
                        // $password = $keyvalue->passwords;
                    }
                    if (\Illuminate\Support\Facades\Hash::check($request->password, $password) == true) {

                        session()->put('id', $id);
                        session()->put('first_name', $first_name);
                        session()->put('last_name', $last_name);
                        session()->put('user_name', $user_name);
                        session()->put('email', $email);
                        session()->put('status', $status);
                        session()->put('is_admin', $is_admin);

                        return 'ok';
                    }else {
                        // return json_encode(\Illuminate\Support\Facades\Hash::check($request->password, $password));
                        return 'Wrong password!!!';
                    }
                }else {
                    return 'No userdata exists';
                }
        }
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
        private function createuser(array $data)
    {
        if(array_key_exists('referral', $data)) {
           $data['referral'] = $data['referral']; 
        }else {
            $data['referral'] = 'admin';
        }
        // return json_encode($data);
        return \App\User::create([
            'token' => uniqid('', true),
            '_token' => $data['_token'],
            'status' => '1',
            'is_admin' => '0',
            'referral' => $data['referral'],
            'amount' => '0',
            'user_name' => $data['name'],
            'email' => $data['email'],
            'last_login' => date("Y-m-d h:i:sa"),
            'ip_address' => request()->ip(),
            'passwords' => \Illuminate\Support\Facades\Hash::make($data['password']),
        ]);

        \App\Activity::create([
                'user_id' => session()->get('id'),
                'title' => 'Welcome to '.confi('app.name'),
                'activity' => session()->get('user_name'). ' signup today at '.date("Y-m-d, h:i:sa").' status => not verified'
            ]);

    }

    private function loginuser(array $data) {
        // return $data['password'];
        // $data = [
        //     'user_name' => $data['name'],
        //     'password' => $data['password']
        // ];
        // return \Auth::attempt($data);
        $user_name = \App\User::where('user_name', $data['user_name']);
        $email = \App\User::where('email', $data['user_name']);
        if ($user_name->count() > 0) {
            return $user_name->get();
        }else {
            return $email->get();
        }
        // return \App\User::where('user_name', $data['user_name'])->get();
    }
}

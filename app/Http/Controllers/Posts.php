<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class Posts extends Controller
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
        if(session()->has('id')) {
            $image = $request->file('file');
            $post = Post::find(1);
            if($image) {
                $imageNames = $image->getClientOriginalName();
                // return $imageNames;
                $ext = explode('.', $imageNames);
                $ext = strtolower(end($ext));
                $allowed = array('jpg', 'png', 'jpeg', 'gif');
                if(in_array($ext, $allowed)) {
                        // return $ext;
                    session()->put('post_token', uniqid());
                    $post_tokn = session()->get('post_token');
                        $newname = uniqid(session()->get('user_name'), true).'.'.$ext;
                        $image->move('sitefiles/postspictures', $newname);
                        // $imageName[] = $image->getClientOriginalName();
                        // $imagePath = public_path("sitefiles/postspictures/$newname");
                        \App\PostImages::create([
                            'image_path' => $newname,
                            'post_token' => $post_tokn,
                            'user_id' => session()->get('id'),
                            'status' => '1'
                        ]);
                        // $post->images()->create([
                        //     'image_path', $imagePath
                        // ]);
                    }else {
                        return 'Invalid file.';
                    }
                // session()->put('all_post_images', $imageName);
                // $formInput['image'] = $imageNames;
                // return $imageName;

        }

        if(\Validator::make($request->all(), [
            'content' => 'required'
        ])->fails()) {
            return 'Error in form.';
        }else {
            $post_tokn = session()->get('post_token');

            $images = \App\PostImages::where('post_token', session()->get('post_token'));
                
            function image($images) {
                if($images->count() > 0) {
                    foreach ($images->get() as $keyalue) {
                        $medias[] = $keyalue->image_path;
                    }
                }
                else {
                    $medias = '';
                }
                return $medias;
            }
            
            $medias = (json_encode(image($images)));
            $pc = Post::create([
                'post_token' => $post_tokn,
                'user_id' => session()->get('id'),
                'status' => '1',
                'type' => 'post',
                'likes' => '0',
                'content' => $request->content,
                'images' => $medias
            ]);
            // return json_encode($medias);//$images->count();//$images->get();
            if($pc) {
                $content = explode(' ', $request->content);
                for ($i=0; $i < count($content); $i++) {
                    if(substr($content[$i], 0,1) == '@') {
                        // return substr($content[$i],1,strlen($content[$i]));
                        $user = \App\User::where('user_name', substr($content[$i],1,strlen($content[$i])));
                        if($user->update(['notifications' => '1'])) {
                            foreach($user->get() as $users ) {
                                $user_id = $users->id;
                                if($user->count() > 0) {
                                    if(\App\Notifications::create([
                                    'user_id' => session()->get('id'), 'content' => session()->get('user_name').' mentioned you in a post. <b>'.substr($request->content,0,30).'</b>', 'status' => '1'
                                    ])) {

                                    }
                                }
                            }
                        }
                        // return ;
                    }
                }
                session()->forget('post_token');
                return 'ok';
            }else {
                return 'Unable to post.';
            }
        }
            // }
        // }
        }else {
                    return 'session expired';//view('auth.register');
                }
        // return $request->all();
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

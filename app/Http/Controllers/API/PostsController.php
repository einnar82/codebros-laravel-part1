<?php

namespace App\Http\Controllers\API;

use App\Events\CreatedPostEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Jobs\BlowJob;
use App\Mail\SendCreatedPost;
use App\Post;

class PostsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('post-limit')->only('store');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->except('email'));
        // dispatch(new BlowJob($post));
        event(new CreatedPostEvent($post, $request->email));
        // \Mail::to($request->email)->send(new SendCreatedPost($post));
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        return tap(Post::findOrFail($id))->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Post::findOrFail($id)->delete()) {
            return response()->json(['message' => 'ok']);
        }
    }
}

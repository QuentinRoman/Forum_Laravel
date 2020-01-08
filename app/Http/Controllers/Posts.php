<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gate;

class Posts extends Controller
{

    public function __construct()
    {
            $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts =  Post::latest()->paginate(10);
        return view('posts/welcome')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $post = auth()->user()->posts()->create($data);

        return redirect()->route('Posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post post
     * @return Factory|RedirectResponse|View
     */
    public function edit($id)
    {
        if (Gate::denies('edit-posts')){
            return redirect()->route('/');
        }

        $post = Post::find($id);
        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $post = Post::find($id);
        $post->update($data);


        return redirect()->route('Posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        if (request()->category){
            $posts = Post::with('categories')->whereHas('categories', function ($query){
                $query->where('slug', request()->category);
            })->paginate(10);
            $categories = Category::all();
        }else{
            $categories = Category::all();
            $posts = Post::with('categories')->paginate(10);
        }

        return view('posts/welcome')->with([
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
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
            'content' => 'required|min:10',
            'category_id' => 'required'
        ]);

        $post = auth()->user()->posts()->create($data);
        $post->categories()->attach($data['category_id']);

        return redirect()->route('posts.show', $post->id);
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


        return redirect()->route('posts.show', $post);
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

    public function search(Request $request){
        $categories = Category::all();
        $search = $request->get('search');
        $posts = Post::where('title', 'like', '%'.$search.'%')->orWhere('content', 'like', '%'.$search.'%')->paginate(5);
        return view('posts/welcome', ['posts' => $posts,
            'categories' => $categories
        ]);
    }
}

<?php

namespace App\Http\Controllers;


use App\Test;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePostRequest;
use App\Mail\PostStored;
use App\Mail\PostUpdated;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Mail::raw('plain text message', function ($message) {
        //     $message->to('bizkits223@gmail.com')->subject('testing');
        // });
        $data = Post::where('user_id',auth()->id())->get();
        return view('home',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();
        $post = Post::create($validated);
        Mail::to('bizkits223@gmail.com')->send(new PostStored($post));
        return redirect('/blog')->with('created',config('process.conditions.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $blog)
    {

        $this->authorize('view',$blog);
        return view('show',['data'=>$blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        $this->authorize('view',$blog);
        $categories = Category::all();
        return view('edit',['data'=>$blog,'category'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $blog)
    {
        $validated = $request->validated();
        $blog->update($validated);
        Mail::to('bizkits223@gmail.com')->send(new PostUpdated());
        return redirect('/blog')->with('edited',config('process.conditions.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        $blog->delete();
        return redirect('/blog')->with('deleted',config('process.conditions.deleted'));
    }
}

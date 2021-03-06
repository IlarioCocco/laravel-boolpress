<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;


class PostController extends Controller
{   

    protected $validationRules = [
        'title' => 'string|required|max:100',
        'content' => 'string|required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.index", compact("posts")); 
        // dd($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); debug

        //validation
        $request->validate($this->validationRules);
        
        $newPost = new Post();
        $newPost->fill($request->all());

        $newPost->slug = $this->getSlug($request->title);

        $newPost->save();

        //reindirizzamento
        return redirect()->route("admin.posts.index")->with('success',"il post è stato creato");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      
        //validation
        $request->validate($this->validationRules);

       
        // dd($request->all());

        if($post->title != $request->title) {
            $post->slug = $this->getSlug($request->title);
        }

        $post->fill($request->all());

        $post->save();

        return redirect()->route("admin.posts.index")->with("success", "il Post {$post->id} è stato aggiornato");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());
        $post = Post::find($request->id);
        $post->delete();

        return redirect()->route("admin.posts.index")->with("success", "il Post {$post->id} è stato eliminato");
    }




    /**
     * getSlug - return a unique slag
     *
     * @param  string  $title
     * @return string
     */
    private function getSlug($title) 
    {
        $slug = Str::of($title)->slug('-');

        $postExist = Post::where("slug", $slug)->first();
        // dd($postExist);

        $count = 2;
        while ($postExist) {
            $slug = Str::of($title)->slug('-') . "-($count)";
            $postExist = Post::where("slug", $slug)->first();
            $count++;
        }  
        return $slug;  
    }
}




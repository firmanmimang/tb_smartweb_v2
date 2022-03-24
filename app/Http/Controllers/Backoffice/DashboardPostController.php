<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'publish_status'=> 'required|in:true,false',
            'comment_status'=> 'required|in:true,false',
        ]);

        try {
            if($request->file('image')){
                $validatedData['image'] = $request->file('image')->store('post-images');
            }
    
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
            $validatedData['publish_status'] = $validatedData['publish_status'] == 'true' ? true : false;
            $validatedData['comment_status'] = $validatedData['comment_status'] == 'true' ? true : false;
            
            DB::beginTransaction();
            Post::create($validatedData);
            DB::commit();
    
            return redirect()->route('dashboard.posts.index')->with('success', 'New post has been added successfuly.');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('dashboard.posts.index')->with('error', 'Something went wrong on adding new post.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
            'body' => 'required',
            'publish_status'=> 'required|in:true,false',
            'comment_status'=> 'required|in:true,false',
        ];

        ($request->slug != $post->slug)?
            $rules['slug'] = 'required|unique:posts'
            : null
        ;

        $validatedData = $request->validate($rules);

        try {
            if($request->file('image')){
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('post-images');
            }
    
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
            $validatedData['publish_status'] = $validatedData['publish_status'] == 'true' ? true : false;
            $validatedData['comment_status'] = $validatedData['comment_status'] == 'true' ? true : false;
            
            DB::beginTransaction();
            Post::where('id', $post->id)
                ->update($validatedData);
            DB::commit();
    
            return redirect()->route('dashboard.posts.index')->with('success', 'Post '. $post->title .' has been updated.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;

            return redirect()->route('dashboard.posts.index')->with('error', 'Something went wrong on editing '. $post->title .' post.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            if($post->image){
                Storage::delete($post->image);
            }

            DB::beginTransaction();
            Post::destroy($post->id);
            DB::commit();

            return redirect()->route('dashboard.posts.index')->with('success', 'Post '. $post->title .' has been deleted.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.posts.index')->with('error', 'Something went wrong on deleting '. $post->title .' post.');
        }
    }

    /**
     * for generating slug on change event input title form post, access using fetch js
     * @return json
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

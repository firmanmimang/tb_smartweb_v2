<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MANUAL AUTHORIZE
        // if(!auth()->check() || auth()->user()->username !== 'mimang'){
        //     abort(403);
        // }

        $this->authorize('admin');

        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            DB::beginTransaction();

            $category = new Category;

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->description = $request->description;
            
            $category->save();

            DB::commit();

            return redirect()->route('dashboard.categories.index')->with('success', 'Category '. $category->name .' created succesfully.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            return redirect()->route('dashboard.categories.index')->with('error', 'Something went wrong on creating category.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();

            $categoryUpdate = Category::find($category->id);

            if($categoryUpdate->name !== $request->name){
                $categoryUpdate->name = $request->name;
                $categoryUpdate->slug = Str::slug($request->name);
            }
            $categoryUpdate->description = $request->description;
            
            $categoryUpdate->save();

            DB::commit();

            return redirect()->route('dashboard.categories.index')->with('success', 'Category '. $category->name .' updated to '. $categoryUpdate->name .'.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.categories.index')->with('error', 'Something went wrong on updating '. $category->name .' category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();

            $category->delete();

            DB::commit();

            return redirect()->route('dashboard.categories.index')->with('success', 'Category '. $category->name .' deleted successfuly');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.categories.index')->with('error', 'Something went wrong on deleting '. $category->name .' category.');
        }
    }
}

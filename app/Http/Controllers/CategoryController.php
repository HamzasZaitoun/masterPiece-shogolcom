<?php

namespace App\Http\Controllers;
use App\Http\Requests\storeCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =Category::all();
        return view('admin.categoriesTable.index',compact('categories')); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoriesTable.create'); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCategoryRequest $request)
    {
        $validatedData=$request->validated();
        if ($request->hasFile('category_picture')) {
            $fileName = time() . '.' . $request->category_picture->extension();
            $request->category_picture->move(public_path('uploads/categories'), $fileName);
            $validatedData['category_picture'] = $fileName;
        }
        // dd($validatedData);
        Category::create($validatedData);
       
        return redirect()->route('admin.categories.index')->with('success','category created succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $category = Category::where('category_id', $id)->first();
        return view('admin.categoriesTable.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $category=Category::where('category_id',$id)->first();
       return view('admin.categoriesTable.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeCategoryRequest $request, string $id)
    {
        // Validate the incoming data
        $validatedData = $request->validated();
    
        // Find the category by its category_id (not 'id')
        $category = Category::where('category_id', $id)->first();
        // dd($category);
        // Check if the category exists
        if (!$category) {
            return redirect()->back()->withErrors('Category not found!');
        }
    
        // Handle the category picture if a new one is uploaded
        if ($request->hasFile('category_picture')) {
            // If the category already has a picture, delete the old one
            if ($category->category_picture && file_exists(public_path('uploads/categories/' . $category->category_picture))) {
                unlink(public_path('uploads/categories/' . $category->category_picture));
            }
    
            // Upload the new category picture
            $fileName = time() . '.' . $request->category_picture->extension();
            $request->category_picture->move(public_path('uploads/categories'), $fileName);
    
            // Update the picture field in the validated data
            $validatedData['category_picture'] = $fileName;
        }
        // dd($validatedData);
    
        // Update the category with the validated data (including the updated picture if any)
        $category->update($validatedData);
    
        // Redirect with success message
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('category_id', $id)->first();
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','category deleted succefully');
    }
}

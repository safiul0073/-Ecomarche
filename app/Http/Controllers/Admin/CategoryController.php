<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categroy;
    public function __construct (CategoryRepository $categoryRepository) {
        $this->categroy = $categoryRepository;
    }
    public function index()
    {
       
        return view('Backend.Category.index');
    }


    public function create()
    {
        return view('Backend.Category.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);
        
        $att = ['name' => $request->name, 'status' => $request->status];
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
       

        return view('Backend.Category.create', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $att = ['name' => $request->name, 'status' => $request->status];
        $category->update($att);

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}

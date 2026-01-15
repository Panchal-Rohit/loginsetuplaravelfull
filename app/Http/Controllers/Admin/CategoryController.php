<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category.view')->only('index');
        $this->middleware('permission:category.manage')
             ->only('store','destroy','storeSub','destroySub');
    }

    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::withCount('subCategories')->get(),
            'subCategories' => SubCategory::with('category')->get(),
        ]);
    }

    /* MAIN CATEGORY */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        Category::create($request->only('name'));
        return back()->with('success','Category created');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete(); // 🔥 cascade delete
        return back()->with('success','Category deleted');
    }

    /* SUB CATEGORY */
    public function storeSub(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=>'required'
        ]);

        SubCategory::create($request->all());
        return back()->with('success','Sub Category created');
    }

    public function destroySub($id)
    {
        SubCategory::findOrFail($id)->delete();
        return back()->with('success','Sub Category deleted');
    }
}

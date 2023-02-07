<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        return view('dashboard.category.add_category');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ], [
            'category_name.required' => "Category Name is must!",
            'category_name.unique' => "Category already exist!",
        ]);

        Category::insert([
            'category_name' => $request->category_name
        ]);

        $notifications = array(
            'message' => 'Category added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.category')->with($notifications);
    }

    public function manageCategory()
    {
        $allCategory = Category::orderBy('id', 'desc')->get();
        return view('dashboard.category.manage_category', compact('allCategory'));
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('dashboard.category.edit_category', compact('category'));
    }

    public function updateCategory(Request $request)
    {

        $request->validate([
            'category_name' => 'required',
        ], [
            'category_name.required' => "Category Name is must!"
        ]);

        Category::findOrFail($request->id)->update([
            'category_name' => $request->category_name
        ]);

        $notifications = array(
            'message' => 'Category Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.category')->with($notifications);
    }

    public function deactivateCategory($id)
    {
        Category::findOrFail($id)->update([
            'status' => '1'
        ]);

        $notifications = array(
            'message' => 'Category Deactivated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.category')->with($notifications);
    }

    public function activateCategory($id)
    {
        Category::findOrFail($id)->update([
            'status' => '2'
        ]);

        $notifications = array(
            'message' => 'Category activated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.category')->with($notifications);
    }
}

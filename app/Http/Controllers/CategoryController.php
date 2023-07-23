<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function AddCat(Request $request)
    {

        $validateData = $request->validate(
            [
                'category_name' => 'required | unique:categories|max:25',
            ],
            [
                'category_name.required' => '!لطفا فیلد مورد نظر را پر کنید',
                'category_name.max' => '!تعداد کارکتر ها بیش از حد مجاز است',
            ]
        );

        //elequent orm insert procedure 1
        // Category::insert([
        //     'category_name' => $request -> category_name,
        //     'user_id' => Auth::user() -> id,
        //     'created_at' => Carbon::now()
        // ])

        //elequent orm insert procedure 2
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->back()->with('success', 'دسته بندی با موفقیت اضافه شد');
    }
}

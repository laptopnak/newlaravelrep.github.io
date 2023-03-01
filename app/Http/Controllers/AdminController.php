<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CategoryModel;
use App\Models\Products;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');

    }
    public function admin_login(Request $request)
    {

        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email' => $email, 'password' => $password])->get();
        if (isset($result[0]->id)) {

            $request->session()->put('admin_login', true);
            $request->session()->put('admin_id', $result[0]->id);
            return redirect('admin/home');
        } else {
            $request->session()->flash('error', 'Enter Valid Details...');
            return redirect()->back();
        }
    }

    public function home_page()
    {
        return view('admin.home');
    }

    public function category_page()
    {
        return view('admin.category');
    }

    public function add_category(Request $request)
    {

        $category = new CategoryModel();
        $category->cat_title = $request['name'];
        $category->cat_image = $request->file('image')->store('/category');
        $category->cat_status = $request['status'];
        $category->save();
        return redirect()->back();
    }

    public function show_category()
    {
        $category = CategoryModel::all();
        return view('admin/category', compact('category'));
    }

    public function delete_category($id)
    {

        $category = CategoryModel::find($id);
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully !');

        return redirect()->back();
    }

    public function edit_category($id)
    {

        $category = CategoryModel::find($id);
        return response()->json([
            'data' => $category,
        ]);
    }

    public function update_category(Request $request)
    {

        $data_id = $request['data_id'];

        $category = CategoryModel::find($data_id);

        if ($request->hasfile('edit_image')) {

            $category->cat_title = $request['edit_name'];
            $category->cat_image = $request->file('edit_image')->store('/category');
            $category->cat_status = $request['edit_status'];

        } else {

            $category->cat_title = $request['edit_name'];
            $category->cat_status = $request['edit_status'];
           
        }
         $category->update();
            return redirect()->back();
    }

    // Products Functions

    public function products(){
        $products = Products::all();
        $category = CategoryModel::all();
        return view('admin/products', compact('category', 'products'));
    }

    public function add_product(Request $request){

        $product = new Products();
        $product-> p_title = $request['p_name'];
        $product-> p_description = $request['p_description'];
        $product-> p_price = $request['p_price'];
        $product-> p_sale_price = $request['p_sale_price'];
        $product-> p_quantity = $request['p_quantity'];
        $product-> p_status = $request['p_status'];
        $product-> category_id = $request['p_category'];

        $product-> p_image = $request->file('p_image')->store('/products');
        $product->save();
        return redirect()->back();
        
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // category sidebar
    public function view_category()
    {
        if(Auth::id())
        {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    else{
        return redirect('login');
    }
    }

    public function add_category(Request $request)
    {
        if(Auth::id()){
        Category::create([
            'category_name' => $request->category
        ]);
        return redirect()->back()->with('message', 'Category has been created successfully.');
    }
    else{
        return redirect('login');
    }
    }

    public function delete_category($id)
    {
        if(Auth::id()){
        $data = Category::findOrfail($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category has been deleted successfully.');}
        else{
            return redirect('login');
        }
    }

    // to product sidebar
    public function view_product()
    {
        if(Auth::id()){
        $category = Category::all();
        return view('admin.product', compact('category'));
        }
        else{
            return redirect('login');
        }
    }
    public function add_product(Request $request)
    {
        if(Auth::id()){
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            
            $image = $request->image,
            $imageName = time() . '.' . $image->getClientOriginalExtension(),
            $request->image->move('product', $imageName),
            'image' => $imageName,
        ]);
        return redirect()->back()->with('message', 'Product has been added successfully');
    }
    else{
        return redirect('login');
    }
    }
    public function show_product()
    {
        if(Auth::id()){
        $products = Product::all();
        return view('admin.show_product', compact('products'));
        }
        else{
            return redirect('login');
        }
    }
    public function delete_product($id)
    {
        if(Auth::id()){
        $products = Product::findOrfail($id);
        $products->delete();
        return redirect()->back()->with('message', 'Product has been deleted successfully.');
        }
        else{
            return redirect('login');
        }
    }

    public function edit_product($id){
        if(Auth::id()){
        $product=Product::findOrfail($id);
        $category=Category::all();
        return view('admin.update_product',compact('product','category'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_product($id,Request $request){
        if(Auth::id()){
        $product=Product::findOrfail($id);
        $product->update($request->all());
        $image=$request->image;
        if($image){
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $image->move("product",$imageName);
            $product->image = $imageName;
            $product->save();
        }
        return redirect()->back()->with('message','product details has been updated');
    }
    else{
        return redirect('login');
    }
    }
    public function order(){
        if(Auth::id()){
        $order=Order::all();
        return view('admin.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
    public function delivery($id){
        if(Auth::id()){
        $order=Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
    public function print_pdf($id){
        if(Auth()){
        $order=Order::find($id);
        $pdf=Pdf::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details');
        }
        else{
            return redirect('login');
        }
    }

    public function send_email($id){
        if(Auth()){
        $order=Order::find($id);
        return view('admin.email_info',compact('order'));
        }
        else{
            return redirect('login');
        }
    }

    public function searchData(Request $request){
        if(Auth()){
        $searchText=$request->search;
        $order=Order::where("name","LIKE","%$searchText%")->orWhere("product_title","LIKE","%$searchText%")->get();
        return view('admin.order',compact('order'));
        }
        else{
            return redirect('login');
        }

    }
}
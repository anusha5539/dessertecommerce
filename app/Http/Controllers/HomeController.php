<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $total_product=Product::all()->count();
            $total_order=Order::all()->count();
            $total_customer=User::all()->count();
            $order=Order::all();
            $total_revenue=0;
            foreach ($order as $item) {
                $total_revenue=$total_revenue+$item->price;
            }

            $order_delivery=Order::where('delivery_status','=','delivered')->get()->count();
            $order_processing=Order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_customer','total_revenue','order_delivery','order_processing'));
        }
        else{
            $product=Product::paginate(4);
            $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
        return view('userpanel.home',compact('product','comment','reply'));
        }
    }
    public function index(){
        $product=Product::paginate(4);
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view('userpanel.home',compact('product','comment','reply'));
    }

    public function product_details($id){
        $product=Product::find($id);
        return view('userpanel.detail',compact('product'));
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user=Auth::user();
            $userId=$user->id;
            $product=Product::find($id);
            $product_exits_id=Cart::where('product_id','=',$id)->where('user_id','=',$userId)->get('id')->first();
            if($product_exits_id){
                $cart=Cart::find($product_exits_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity+$request->quantity;
                if($product->discount_price){
                    $cart->price=$product->discount_price * $cart->quantity;
                }
                else{
                $cart->price=$product->price * $cart->quantity;
                }
                $cart->save();
                Alert::success('product Added Successfully','We have added product to the cart');
                return redirect()->back();
            }
            else{
            $cart=new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->quantity=$request->quantity;
            $cart->product_title=$product->title;
            if($product->discount_price){
                $cart->price=$product->discount_price * $request->quantity;
            }
            else{
            $cart->price=$product->price * $request->quantity;
            }
           
            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->save();
            return redirect()->back()->with('message','Product has been added to cart successfully.');
        }
        }
        else{
            return redirect('login');
        }
    }

    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('userpanel.show_cart',compact('cart'));
        }
        else{
            return redirect('/login');
        }
       
    }
    
    public function remove_product($id){
        $cart=Cart::findOrfail($id);
        $cart->delete();
        return redirect()->back()->with('message','Product has been deleted successfully');
    }

    public function cash_order(){
        $user=Auth::user();
        $userId=$user->id;
        $data=Cart::where('user_id','=',$userId)->get();
        foreach($data as $data){
            $order=new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::findOrfail($cart_id);
            $cart->delete();
             
        }
        return redirect()->back()->with('message','Order has been placed successfully.'); 
    }

    function stripe($totalprice){
        return view('userpanel.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" =>$totalprice*100 ,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank you for payment" 
        ]);
        $user=Auth::user();
        $userId=$user->id;
        $data=Cart::where('user_id','=',$userId)->get();
        foreach($data as $data){
            $order=new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='Paid';
            $order->delivery_status='processing';
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::findOrfail($cart_id);
            $cart->delete();
             
        }
      
        Session::flash('success', 'Payment successfull!');
              
        return back();
    }


    public function show_order(){
        $id=Auth::id();
        if($id){
            $user=Auth::user();
            $userId=$user->id;
            $order=Order::where('user_id','=',$userId)->get();
            return view('userpanel.order',compact('order'));
        }
        else{
            return redirect('/login');
        }
    }

    public function cancel_order($id){
        $order=Order::find($id);
        $order->delivery_status='You canceled the order.';
        $order->save();
        return redirect()->back();
    }

    public function add_comment(Request $request){
        if(Auth::id()){
          Comment::create(
                [
                    'name'=>Auth::user()->name,
                    'comment'=> $request->comment,
                    'user_id'=>Auth::user()->id
                ]);
                return redirect()->back();
        }
        else{
            return redirect('/login');
        }

    }
    public function add_reply(Request $request){
        if(Auth::id()){
            Reply::create([
                'name'=>Auth::user()->name,
                'comment_id'=>$request->commentId,
                'reply'=>$request->reply,
                'user_id'=>Auth::user()->id
            ]);
            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }
    public function search_product(Request $request){
        $searchData=$request->search;
        $product=Product::where("title","LIKE","%$searchData%")->orWhere("category","LIKE","%$searchData%")->paginate(4);
        $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
        
        return view('userpanel.home',compact('product','comment','reply'));
    }
    public function product_search(Request $request){
        $searchData=$request->search;
        $product=Product::where("title","LIKE","%$searchData%")->orWhere("category","LIKE","%$searchData%")->paginate(4);
        $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
        
        return view('userpanel.all_product',compact('product','comment','reply'));
    }
    
    public function all_product(){
        $product=Product::paginate(8);
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view('userpanel.all_product',compact('product','comment','reply'));
    }
}

@include('userpanel.layout.header')

<div class="container py-5">
@if($session=session('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{$session}}
    </div>
    @endif  
        <div class="row">
            <div class="col-md-6">              
                <img class="img-fluid h-100 w-100 border rounded"  src="/product/{{$product->image}}" alt="Error loading images">   
            </div>
            <div class="col-md-6 mt-3">       
               
                <h1  class="font-weight-bold text-center">{{$product->title}}</h1>  
                <p  class="my-3"><div class="font-weight-bold mb-2">Description:</div>  {{$product->description}}</p>  
                <p  class="my-3"><div class="font-weight-bold mb-2">Category:</div>{{$product->category}}</p>  
                <p  class="my-3"><div class="font-weight-bold mb-2">Quantity: </div>{{$product->quantity}}</p> 
                @if($product->discount_price!=null)
                <p style="color:blue; text-decoration:line-through" class="my-3 font-weight-bold">Product Price: {{$product->price}}</p>  
                <p style="color:red"  class="my-3 font-weight-bold">Discount Price: {{$product->discount_price}}</p>  
               
                @else
                <p  class="my-3 font-weight-bold">{{$product->price}}</p> 
                @endif
                <form class="btn border border-dark m-auto inner text-light w-75" style="background-color:rgb(121, 8, 8)"  action="{{url('/add_cart',$product->id)}}" method="post">
                    @csrf
                    <input name="quantity" min="1" class=" w-50 text-dark" type="number">
                    <input style="background-color:rgb(121, 8, 8)"  type="submit" value="Add to cart">
                </form>
            </div>
          
        </div>
            
       
    </div>
    @include('userpanel.layout.footer')
    @include('userpanel.layout.script')
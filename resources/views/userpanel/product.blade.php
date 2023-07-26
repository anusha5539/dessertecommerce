<div class="container py-5">
    <h1 style="font-size:40px" class="font-weight-bold text-uppercase text-center mb-5">All Products</h1>
   <div class="mb-3">
    <form action="{{url('/search_product')}}" method="GET" >
        <input class="w-50" type="text" name="search" placeholder="Search product">
        <input type="submit" value="Search" class="text-light px-3 py-2 rounded ml-2" style="background-color:rgb(121, 8, 8)">
    </form>
   </div>
   @if($session=session('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{$session}}
    </div>
    @endif
   
        <div class="row">
        @foreach($product as $products)
            <div class="col-md-3">              
                <img class="h-75 w-100 border rounded"  src="/product/{{$products->image}}" alt="Error loading images">   
                <div  class="text-center font-weight-bold my-2">{{$products->title}}</div>
                <div class="content">
                <a href="{{url('/product_details',$products->id)}}"><button class="btn border border-dark  inner text-light mb-2">Product Details</button></a><br>
                <form class="btn border border-dark m-auto inner text-light w-75" action="{{url('/add_cart',$products->id)}}" method="post">
                    @csrf
                    <input name="quantity" min="1" class=" w-50 text-dark" type="number">
                    <input  type="submit" value="Add to cart">
                </form>
                </div>
            </div>
            @endforeach
        </div>
            
        {!!$product->withQueryString()->links('pagination::bootstrap-4')!!}
    </div>

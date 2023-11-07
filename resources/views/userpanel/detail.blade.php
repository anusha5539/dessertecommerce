@include('userpanel.layout.header')

<div class="py-10">
    @if($session=session('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{$session}}
        </div>
    @endif  
    <div class="grid md:grid-cols-2 gap-4">
        <div class="grid justify-items-center">              
            <img class="sm:h-cover sm:w-fit h-80 w-80 rounded sm:px-0"  src="/product/{{$product->image}}" alt="Error loading images">   
        </div>
        <div class="md:mr-5 ml-4">          
            <h1  class="font-bold text-2xl text-center">{{$product->title}}</h1>  
            <p  class="my-3"><div class="font-bold md:mb-0 mb-3">Description:</div>  {{$product->description}}</p>  
            <p  class="my-3"><div class="font-bold md:mb-0 mb-3">Category:</div>{{$product->category}}</p>  
            <p  class="my-3"><div class="font-bold  md:mb-0 mb-3">Quantity: </div><span class=mr-3>Available:</span>{{$product->quantity}}</p> 
            @if($product->discount_price!=null)
                <p class="my-3 font-bold text-blue-700 line-through">Product Price: {{$product->price}}</p>  
                <p class="my-3 font-bold text-red-600">Discount Price: {{$product->discount_price}}</p>  
               
            @else
                <p  class="my-3 font-bold text-blue-700">Product Price:{{$product->price}}</p> 
            @endif
            <form class="sm:w-96 w-52  btn border bg-orange-500 hover:bg-orange-700 text-white  action="{{url('/add_cart',$product->id)}}" method="post">
                @csrf
                <input name="quantity" min="1" class="text-black hover:border-black" type="number">
                <input class="lg:pl-7 pl-5" type="submit" value="Add to cart">
            </form>
        </div>
          
    </div>
</div>
</div>
    @include('userpanel.layout.footer')
  
<div class="py-5">
    <h1 class="lg:text-5xl md:text-4xl sm:text-3xl text-lg font-bold uppercase text-center mb-5">All Products</h1>
   <div class="lg:my-10 my-5">
    <form  action="{{url('/search_product')}}" method="GET" >
        <input class="ml-4 sm:py-2 py-0 w-6/12 border-2 border-red-900 hover:border-red-900" type="text" name="search" placeholder="Search">
        <input type="submit" value="Search" class="bg-red-900 text-white border-white md:px-5 md:py-2 sm:px-3 sm:py-1 px-2 py-1  border-2 rounded-lg sm:text-lg text-xs">
    </form>
   </div>
   @if($session=session('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{$session}}
    </div>
    @endif

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($product as $products)
            <div class="">
                <img class="lg:h-60 lg:w-72 md:h-80  md:w-96 sm:h-64 sm:w-80 h-48 m-auto w-48  rounded lg:mt-0 mt-10"  src="/product/{{$products->image}}" alt="Error loading images">   
                <div  class="text-center font-bold my-2">{{$products->title}}</div>
                <div class="mt-5">
                    <a href="{{url('/product_details',$products->id)}}"><button class="btn lg:ml-4 sm:ml-12 border bg-orange-500 text-white mb-2 py-1 px-2 hover:bg-orange-700 cover">Product Details</button></a><br>
                    <form class="btn border bg-orange-500 hover:bg-orange-700 text-white lg:w-50 w-[13rem] lg:mx-4 sm:mx-12 cover" action="{{url('/add_cart',$products->id)}}" method="post">
                        @csrf
                        <input name="quantity" min="1" class="w-20 text-black" type="number">
                        <input class="lg:pl-7 pl-5" type="submit" value="Add to cart">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
            <div class="my-10 mx-7">
                {{ $product->links('pagination::tailwind') }}
            </div>
    
    </div>

@include('userpanel.layout.header')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg hidden sm:block mx-5">
    
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead>
            <tr class="font-bold border border-black">
                <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Product title</th>
                <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Product Quantity</th>
                <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Product Price</th>
                <th class="border text-center font-semibold p-4 border-black text-black  bg-blue-500 w-25">Product Image</th>
                <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Product Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $totalprice=0; ?>
                @foreach($cart as $carts)
                <tr>
                    <td class="border text-black text-center  border-black">{{$carts->product_title}}</td>
                    <td class="border text-black text-center  border-black">{{$carts->quantity}}</td>
                    <td class="border text-black text-center  border-black">{{$carts->price}}</td>
                    <td  class="border text-black  border-black text-center "><img class="lg:p-5 md:p-2  lg:h-72  lg:w-72 md:h-44  md:w-52 h-24 w-24" src="/product/{{$carts->image}}" alt="Error loading"></td>
                    <td class="border border-black">
                        <a onclick="return confirm ('Are you sure??')" class="rounded bg-red-600 text-white py-2 lg:px-4 md:px-1 lg:mx-14 ml-1" href="{{url('/remove_product',$carts->id)}}">Remove Product</a>
                    </td>
                </tr>
                <?php $totalprice= $totalprice + $carts->price ?>
               
                @endforeach
            </tbody>
        </table>
</div>
<div class="grid sm:grid-cols-2 gap-4 sm:hidden">
        <?php $totalprice=0; ?>
        @foreach($cart as $carts)
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-5">
            <p class=" text-black font-semibold text-center">{{$carts->product_title}}</p>
            <p class="text-black">Quantity: {{$carts->quantity}}</p>
            <p class="text-black">Price: Rs {{$carts->price}}</p>
            <p  class="text-black">Image:<img class="h-52 w-52" src="/product/{{$carts->image}}" alt="Error loading"></p>
            <p class="mt-5">
                <a onclick="return confirm ('Are you sure??')" class="rounded bg-red-600 text-white py-2 px-4 " href="{{url('/remove_product',$carts->id)}}">Remove Product</a>
            </p>
        </div>
        <?php $totalprice= $totalprice + $carts->price ?>
       
        @endforeach
    </tbody>

</div>
<div>
    <h1 class="mt-10 text-center font-weight-bold">Total Price: Rs  {{$totalprice}}</h1>
</div>
<div class="text-center my-10">
    <h5 class="font-bold uppercase mb-5">Proceed to order:</h5>
    <a href="{{url('/cash_order')}}" class="bg-red-600 text-white  px-3 py-2">Cash on delivery</a><br/><div class="mb-5"></div>
    <a href="{{url('/stripe',$totalprice)}}" class="bg-red-600 text-white px-3 py-2">Pay using card</a>
    
</div>

    @include('userpanel.layout.footer')
 
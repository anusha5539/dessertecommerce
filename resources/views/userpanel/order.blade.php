@include('userpanel.layout.header')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg hidden sm:block mx-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <div class="thead">
                    <tr class="font-bold border border-black" >
                        <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Product Title</th>
                        <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Quantity</th>
                        <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Price</th>
                        <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Payment Status</th>
                        <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Delivery Status</th>
                        <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Image</th>
                        <th class="border text-center font-semibold p-4 border-black text-black bg-blue-500">Action</th>
                    </tr>
                </div>

                <tbody>
                @foreach($order as $orders)
                    <tr>
                        <td class="border text-black text-center  border-black">{{$orders->product_title}}</td>
                        <td class="border text-black text-center  border-black">{{$orders->quantity}}</td>
                        <td class="border text-black text-center  border-black">{{$orders->price}}</td>
                        <td class="border text-black text-center  border-black">{{$orders->payment_status}}</td>
                        <td class="border text-black text-center  border-black">{{$orders->delivery_status}}</td>
                        <td class="border text-black text-center  border-black">
                            <img src="product/{{$orders->image}}" class="lg:p-5 md:p-2  lg:h-72  lg:w-72 md:h-44  md:w-52 h-24 w-24" alt="error loading image">
                        </td>
                        <td class="border text-black text-center  border-black">
                            @if($orders->delivery_status=='processing')
                            <a class="rounded bg-red-600 text-white py-2 lg:px-4 md:px-1 mx-0" href="{{url('/cancel_order',$orders->id)}}" onclick="return confirm('Are you sure you want to cancel order?')">Cancel order</a>
                            @else
                            <p class="text-blue-500">Not allowed</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
<div class="grid sm:grid-cols-2 gap-4 sm:hidden">
    @foreach($order as $orders)
    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-5">
        <p class=" text-black font-semibold text-center">{{$orders->product_title}}</p>
        <p class="text-black">Quantity: {{$orders->quantity}}</p>
        <p class="text-black">Price: Rs {{$orders->price}}</p>
        <p class="text-black">Payment status: {{$orders->payment_status}}</p>
        <p class="text-black">Delivery Status: {{$orders->price}}</p>
        <p  class="text-black">Image:<img class="h-52 w-52" src="/product/{{$orders->image}}" alt="Error loading"></p>
        <p class="mt-5">
            @if($orders->delivery_status=='processing')
                            <a class="rounded bg-red-600 text-white py-2 px-5" href="{{url('/cancel_order',$orders->id)}}" onclick="return confirm('Are you sure you want to cancel order?')">Cancel order</a>
                            @else
                            <p class="text-blue-500">Not allowed</p>
                            @endif
        </p>
    </div>
    @endforeach

</div>
@include('userpanel.layout.footer')
   
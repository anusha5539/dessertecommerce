@include('userpanel.layout.header')
<div class="container py-5">
    <div class="row">
        <div class="col">
            <table class="border border-dark p-2 bg-primary">
                <div class="thead">
                    <tr >
                        <th class="border border-dark px-5 py-3 bg-primary">Product Title</th>
                        <th class="border border-dark px-5 py-3 bg-primary">Quantity</th>
                        <th class="border border-dark px-5 py-3 bg-primary">Price</th>
                        <th class="border border-dark px-5 py-3 bg-primary">Payment Status</th>
                        <th class="border border-dark px-5 py-3 bg-primary">Delivery Status</th>
                        <th class="border border-dark px-5 py-3 bg-primary">Image</th>
                        <th class="border border-dark px-5 py-3 bg-primary">Action</th>
                    </tr>
                </div>

                <tbody>
                @foreach($order as $order)
                    <tr>
                        <td class="border border-dark p-2 bg-light text-center">{{$order->product_title}}</td>
                        <td class="border border-dark p-2 bg-light text-center">{{$order->quantity}}</td>
                        <td class="border border-dark p-2 bg-light text-center">{{$order->price}}</td>
                        <td class="border border-dark p-2 bg-light text-center">{{$order->payment_status}}</td>
                        <td class="border border-dark p-2 bg-light text-center">{{$order->delivery_status}}</td>
                        <td class="border border-dark p-2 bg-light text-center">
                            <img src="product/{{$order->image}}" class="h-100 w-100" alt="error loading image">
                        </td>
                        <td class="border border-dark p-2 bg-light text-center">
                            @if($order->delivery_status=='processing')
                            <a class="btn btn-danger" href="{{url('/cancel_order',$order->id)}}" onclick="return confirm('Are you sure you want to cancel order?')">Cancel order</a>
                            @else
                            <p class="text-primary">Not allowed</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('userpanel.layout.footer')
    @include('userpanel.layout.script')
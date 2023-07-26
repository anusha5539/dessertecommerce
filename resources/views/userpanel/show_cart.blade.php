@include('userpanel.layout.header')

<div class="container-fluid py-5">
@if($session=session('message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{$session}}
                    </div>
                    @endif
        <table class="border border-dark text-center">
            <thead>
            <tr class="font-weight-bold border border-dark">
                <td class="border p-4 border-dark bg-primary">Product title</td>
                <td class="border p-4 border-dark bg-primary">Product Quantity</td>
                <td class="border p-4 border-dark bg-primary">Product Price</td>
                <td class="border p-4 border-dark bg-primary w-25">Product Image</td>
                <td class="border p-4 border-dark bg-primary">Product Action</td>
            </tr>
            </thead>
            <tbody>
                <?php $totalprice=0; ?>
                @foreach($cart as $carts)
                <tr>
                    <td class="border border-dark">{{$carts->product_title}}</td>
                    <td class="border border-dark">{{$carts->quantity}}</td>
                    <td class="border border-dark">{{$carts->price}}</td>
                    <td  class="border border-dark text-center "><img class="p-3 img-fluid h-75 w-75" src="/product/{{$carts->image}}" alt="Error loading"></td>
                    <td class="border border-dark">
                        <a onclick="return confirm ('Are you sure??')" style="text-decoration:none;" class="rounded btn-danger py-2 px-4" href="{{url('/remove_product',$carts->id)}}">Remove Product</a>
                    </td>
                </tr>
                <?php $totalprice= $totalprice + $carts->price ?>
               
                @endforeach
            </tbody>
        </table>
        <div>
            <h1 class="mt-5 text-center font-weight-bold">Total Price: Rs  {{$totalprice}}</h1>
        </div>
        <div class="text-center mt-5">
            <h5 class="font-weight-bold text-uppercase">Proceed to order:</h5>
            <a href="{{url('/cash_order')}}" class="btn btn-danger mt-3 mr-3">Cash on delivery</a>
            <a href="{{url('/stripe',$totalprice)}}" class="btn btn-danger mt-3">Pay using card</a>
            
        </div>
</div>

    @include('userpanel.layout.footer')
    @include('userpanel.layout.script')
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .header{
            font-size:40px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            @if($session=session('message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{$session}}
                    </div>
                    @endif
                <h1 class="text-center font-weight-bold py-5 header">All Products</h1>
                <form action="{{url('/search')}}" method="get" class="mb-4">
                    @csrf
                    <input class=" text-dark w-25 m-auto" type="text" name="search" placeholder="Search product here">
                    <input class="btn btn-primary" type="submit" value="Search">
                </form>
                <table class="border border-light text-center">
                    <thead>
                        <tr>
                            <th class="border border-light bg-primary">Name</th>
                            <th class="border border-light bg-primary">Email</th>
                            <th class="border border-light bg-primary">Phone</th>
                            <th class="border border-light bg-primary">Address</th>
                            <th class="border border-light bg-primary">Product title</th>
                            <th class="border border-light bg-primary">Price</th>
                            <th class="border border-light bg-primary">Quantity</th>
                            <th class="border border-light bg-primary">Delivery status</th>
                            <th class="border border-light bg-primary">Payment status</th>
                            <th class="border border-light bg-primary">Image</th>
                            <th class="border border-light bg-primary">Delivered</th>
                            <th class="border border-light bg-primary">Print Pdf</th>
                            <th class="border border-light bg-primary">Send Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($order as $order)
                        <tr>
                        
                            <td class="border border-light">{{$order->name}}</td>
                            <td class="border border-light">{{$order->email}}</td>
                            <td class="border border-light">{{$order->phone}}</td>
                            <td class="border border-light">{{$order->address}}</td>
                            <td class="border border-light">{{$order->product_title}}</td>
                            <td class="border border-light">{{$order->price}}</td>
                            <td class="border border-light">{{$order->quantity}}</td>
                            <td class="border border-light">{{$order->delivery_status}}</td>
                            <td class="border border-light">{{$order->payment_status}}</td>
                            <td class="border border-light">
                                <img class="" src="/product/{{$order->image}}" alt="error loading image">
                            </td>
                            <td class="border border-light">
                                @if($order->delivery_status=="processing")
                                <a onclick="return confirm('Are you sure you have delivered the product?')" href="{{url('/delivery',$order->id)}}" class="btn btn-primary mt-2">Delivered</a>
                                @else
                                <p>Delivered</p>
                                @endif
                            </td>
                            <td  class="border border-light">
                                <a href="{{url('/print_pdf',$order->id)}}" class="btn btn-secondary">Print Pdf</a>
                            </td>
                            <td  class="border border-light">
                                <a href="{{url('/send_email',$order->id)}}" class="btn btn-secondary">Send email</a>
                            </td>

                            
                        </tr>
                        @empty
                        <tr  >
                            <td colspan="16">No data found</td>
                        </tr>
                        @endforelse
                       
                    </tbody>
                </table>
</div>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
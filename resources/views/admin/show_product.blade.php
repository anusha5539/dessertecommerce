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
                <table class="border border-light text-center">
                    <thead>
                        <tr>
                            <th class="border border-light p-3 bg-primary">Title</th>
                            <th class="border border-light p-3 bg-primary">Description</th>
                            <th class="border border-light p-3 bg-primary">Price</th>
                            <th class="border border-light p-3 bg-primary">Discount Price</th>
                            <th class="border border-light p-3 bg-primary">Quantity</th>
                            <th class="border border-light p-3 bg-primary">Category</th>
                            <th class="border border-light p-3 bg-primary">Product Image</th>
                            <th class="border border-light p-3 bg-primary">Delete</th>
                            <th class="border border-light p-3 bg-primary">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                        
                            <td class="border border-light">{{$product->title}}</td>
                            <td class="border border-light">{{$product->description}}</td>
                            <td class="border border-light">{{$product->price}}</td>
                            <td class="border border-light">{{$product->discount_price}}</td>
                            <td class="border border-light">{{$product->quantity}}</td>
                            <td class="border border-light">{{$product->category}}</td>
                            <td class="border border-light">
                                <img class="p-3" src="/product/{{$product->image}}" alt="error loading image">
                            </td>
                            <td class="border border-light px-2"><a class="btn btn-danger"  onclick="return confirm('Are you sure?')"href="{{url('/delete_product',$product->id)}}">Delete</a></td>
                            <td class="border border-light px-2"><a class="btn btn-success" href="{{url('/edit_product',$product->id)}}">Edit</a></td>
                        </tr>
                        @endforeach
                       
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
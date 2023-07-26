<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .header{
            font-size:40px;
        }
        .button{
            font-size: 20px;
        }
        .button:hover{
            background-color:rgb(26, 147, 227);
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div>
                    @if($session=session('message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{$session}}
                    </div>
                    @endif
                    <h1 class="text-center font-weight-bold py-3 header" >Update Products</h1>
                    <form class=text-center action="{{url('/update_product',$product->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mt-5">
                            <label for="title">Product Title:</label>
                            <input class="w-50 ml-lg-5 text-dark" type="text"  required="" placeholder="Write a title" name="title" value="{{$product->title}}">
                        </div>
                        <div class="mt-3">
                            <label for="description">Product Description:</label>
                            <input class="w-50 text-dark" type="text" placeholder="Write product description" required="" value="{{$product->description}}" name="description">
                        </div>
                        <div class="mt-3">
                            <label for="price">Product Price:</label>
                            <input class="w-50 ml-lg-5 text-dark" type="number" placeholder="Write product price" value="{{$product->price}}" required=""  name="price">
                        </div>
                        <div class="mt-3">
                            <label for="price">Discount Price:</label>
                            <input class="w-50 ml-lg-5 text-dark" type="number" placeholder="Write product price" value="{{$product->discount_price}}"  name="discount_price">
                        </div>
                        <div class="mt-3">
                            <label for="Quantity">Product Quantity:</label>
                            <input class="w-50 ml-lg-4 text-dark" type="number" placeholder="Write quantity" value="{{$product->quantity}}" required=""  name="quantity">
                        </div>
                        <div class="mt-3">
                            <label for="Category">Product Category:</label>
                            <select required=" "   name="category" class="text-dark w-50 ml-lg-3" id=""> 
                                <option value="{{$product->category}}">{{$product->category}}</option>
                            @foreach($category as $category)
                                <option class="text-dark" >{{$category->category_name}}</option>
                                
                                @endforeach
                                </select>
                        </div>

                        <div class="mt-3">
                            <label for="image">Current Product image:</label>
                            <img class="img-fluid h-25 w-25 m-auto" src="/product/{{$product->image}}" alt="Error loading image">
                        </div>
                        <div class="mt-3">
                            <label for="image">Change Product image:</label>
                            <input  class="w-50 ml-lg-3"  type="file" name="image" id="">
                        </div>
                        <div class="mt-3">
                            <input class="btn border border-light text-light button" type="submit" value="Update Product">
                        </div>
                    </form>
                </div>

            </div>
        </div>

        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

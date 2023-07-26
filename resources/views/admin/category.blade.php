<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .header{
            font-size:40px;
        }
        table{
            width: 70%;
            margin:auto;
            text-align:center
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
                    <h1 class="text-center font-weight-bold py-3 header" >Add Category</h1>
                    <form class=text-center action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input class="text-dark" name="category" type="text" placeholder="Write category name">
                        <input class="border border-light px-2 rounded button" type="submit" value="Add category">
                    </form>
                </div>
                <table class="border border-light mt-5">
                    <thead>
                        <tr class="border border-light text-center">
                            <th class="border border-light px-5 py-2 font-weight-bold">Category</th>
                            <th class="border border-light px-5 py-2 font-weight-bold">Action</th>
                        </tr>

                        @foreach($data as $data)
                        <tr class="border border-light">
                            <td class="border border-light  py-3">{{$data->category_name}}</td>
                            <td onclick="return confirm('Are you sure?')" class="border border-light"><a href="{{url('/delete_category',$data->id)}}" class="btn btn-danger">Delete</a></td>
                            
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>

        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

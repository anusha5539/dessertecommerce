<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
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
                <h1 style="font-size:30px" class="text-center mb-5">Send Email to {{$order->email}}</h1>
                <form action="">
                <div class="text-center mb-5">
                    <label for="email">Email Greeting:</label>
                    <input type="text" class="w-50 ml-4">
                </div>
                <div class="text-center mb-5">
                    <label for="email">Email first Line:</label>
                    <input type="text" class="w-50 ml-4">
                </div>
                <div class="text-center mb-5">
                    <label for="email">Email Body:</label>
                    <input type="text" class="w-50 ml-5">
                </div>
                <div class="text-center mb-5">
                    <label for="email">Email Btn Name:</label>
                    <input type="text" class="w-50 ml-3">
                </div>
                <div class="text-center mb-5">
                    <label  for="email">Email Url:</label>
                    <input style="margin-left:4rem" type="text" class="w-50">
                </div>
                <div class="text-center mb-5">
                    <label for="email">Email Last Line:</label>
                    <input type="text" class="w-50 ml-4">
                </div>
                <div class="text-center mb-5">
                    <input type="submit" value="Send Email" class="btn btn-primary">
                </div>
                </form>
</div>
</div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
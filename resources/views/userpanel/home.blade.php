@include('userpanel.layout.header')
<!-- first section -->
@include('sweetalert::alert')
@include('userpanel.layout.banner')
<!-- first section -->

<!-- product- section -->
@include('userpanel.product')

<!-- third section -->
<div class="container py-5">
  <h1 style="font-size:40px" class="text-center pb-5 text-uppercase font-weight-bold">How we work</h1>
  <div class="row">
    <div class="col-lg-3 col-6">
      <img class="img-fluid h-50 w-50 pl-lg-3" src="home/images/img1.png" alt="error loading">
      <h3 class=mt-3>Order confirmation</h3>
      <p>Our manager contact you for special details.</p>
    </div>
    <div class="col-lg-3 col-6">
      <img class="img-fluid h-50 w-50 pl-lg-3" src="home/images/img2.png" alt="error loading">
      <h3 class=mt-3>Making the dessert</h3>
      <p>Our chef makes delicious and unique dessert for you.</p>
    </div>
    <div class="col-lg-3 col-6">
      <img class="img-fluid h-50 w-50 pl-lg-3" src="home/images/img3.png" alt="error loading">
      <h3 class=mt-3>Packaging an order</h3>
      <p>Our staffs gift-wraps your dessert.</p>
    </div>
    <div class="col-lg-3 col-6">
      <img class="img-fluid h-50 w-50 pl-lg-3" src="home/images/img4.png" alt="error loading">
      <h3 class=mt-3>Free delivery</h3>
      <p>Our delivery is convenient and free for you.</p>
    </div>
  </div>
</div>
<!-- third section --> 

<!-- comment and reply section -->
@include('userpanel.comment')
<!-- comment and reply section -->

@include('userpanel.layout.footer')
@include('userpanel.layout.script')

@include('userpanel.layout.header')
<!-- first section -->
@include('sweetalert::alert')
@include('userpanel.layout.banner')
<!-- first section -->

<!-- product- section -->
@include('userpanel.product')

<!-- third section -->
<div class="py-5">
  <h1 class="md:text-5xl sm:text-3xl text-lg font-bold uppercase text-center mb-5">How we work</h1>
  <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-4 sm:my-10 my-5 mx-3">
    <div>
      <img class="h-50 w-50" src="home/images/img1.png" alt="error loading">
      <h3 class="font-bold sm:text-xl text-md ">Order confirmation</h3>
      <p>Our manager contact you for special details.</p>
    </div>
    <div class="sm:mt-0 mt-5">
      <img class="h-50 w-50 " src="home/images/img2.png" alt="error loading">
      <h3 class="font-bold sm:text-xl text-md">Making the dessert</h3>
      <p>Our chef makes delicious and unique dessert for you.</p>
    </div>
    <div class="md:mt-0 sm:mt-5 mt-5">
      <img class="h-50 w-50" src="home/images/img3.png" alt="error loading">
      <h3 class="font-bold sm:text-xl text-md">Packaging an order</h3>
      <p>Our staffs gift-wraps your dessert.</p>
    </div>
    <div class="md:mt-0 sm:mt-5 mt-5">
      <img class="h-50 w-50" src="home/images/img4.png" alt="error loading">
      <h3 class="font-bold sm:text-xl text-md">Free delivery</h3>
      <p>Our delivery is convenient and free for you.</p>
    </div>
  </div>
</div>
<!-- third section --> 

<!-- comment and reply section -->
@include('userpanel.comment')
<!-- comment and reply section -->

@include('userpanel.layout.footer')


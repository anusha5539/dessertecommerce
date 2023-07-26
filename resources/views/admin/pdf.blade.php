<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order pdf</title>
</head>
<body>
<div>
    <h1>Order Details</h1>
    <h3>Customer Name:-</h3><p class="mb-4">{{$order->name}}</p>
    <h3>Customer Email:-</h3><p class="mb-4">{{$order->email}}</p>
    <h3>Customer Phone:-</h3><p class="mb-4">{{$order->phone}}</p>
    <h3>Customer Address:-</h3><p class="mb-4">{{$order->address}}</p>
    <h3>Customer Id:-</h3><p class="mb-4">{{$order->user_id}}</p>

    <h3>Product title:-</h3><p class="mb-4">{{$order->product_title}}</p>
    <h3>Product price:-</h3><p class="mb-4">{{$order->price}}</p>
    <h3>Product quantity:-</h3><p class="mb-4">{{$order->quantity}}</p>
    <h3>Product status:-</h3><p class="mb-4">{{$order->payment_status}}</p>
    <h3>Product Id:-</h3><p class="mb-4">{{$order->product_id}}</p>
    <h3>Product Image:-</h3><img class="h-25 w-25" src="product/{{$order->image}}" alt="Error loading image">
</div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Count</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->count}}</td>
        <td>{{$product->description}}</td>
        <td>
            <form action="{{route('admin.product.delete' , ['id' => $product->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="delete-btn">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>

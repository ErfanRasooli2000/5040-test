<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title>add product</title>
</head>
<body>
    <form action="{{route('admin.product.store')}}" method="post">
        @csrf
        <div>
            <label for="name">Product Name : </label>
            <input id="name" name="name" type="text" placeholder="name" value="{{old('name')}}">
        </div>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <div>
            <label for="count">Count : </label>
            <input id="count" name="count" type="number" placeholder="count" value="{{old('count')}}">
        </div>
        @error('count')
            <div class="error">{{ $message }}</div>
        @enderror

        <div>
            <label for="price">Price : </label>
            <input id="price" name="price" type="number" placeholder="Price" value="{{old('price')}}">
        </div>
        @error('price')
            <div class="error">{{ $message }}</div>
        @enderror

        <div>
            <label for="description">Description : </label>
            <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
        </div>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Save Product</button>
    </form>
</body>
</html>

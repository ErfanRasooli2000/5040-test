<head>
    <title>All Products</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>

<x-app-layout>
    <x-slot name="header">
        <div style="display: flex;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <h2  class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 20px">
                <a href="{{route('user.products')}}">ALL Products</a>
            </h2>

            <h2  class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 20px">
                <a href="{{route('user.cart')}}">My Cart</a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="products-holder">
                    @foreach($all as $product)
                    <div class="product">
                        <p>Name : {{$product->name}}</p>
                        <p>price : {{$product->price}}</p>
                        <p>Available : {{$product->count}}</p>
                        <p>{{$product->description}}</p>
                        <a style="color: red" href="{{route('add_to_cart' , ['id' => $product->id])}}">+ Add To Cart</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

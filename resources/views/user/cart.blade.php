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
                    <h2 style="font-size: 22px ; text-align: center; margin: 20px">My Cart</h2>
                    <?php $available = true ;?>
                    @foreach($all as $one)
                        <div class="product">
                            <p>Name : {{$one->product->name}}</p>
                            <p>price : {{$one->product->price}}</p>
                            <p>count : {{$one->count}}</p>
                            <p>{{$one->product->description}}</p>
                            <div>
                                <a style="color: green" href="{{route('add_to_cart' , ['id' => $one->product->id])}}">+ Add To Cart</a></br>
                                <a style="color: red" href="{{route('remove_from_cart' , ['id' => $one->product->id])}}">- Remove To Cart</a></br>
                                <a style="color: darkred" href="{{route('delete_from_cart' , ['id' => $one->product->id])}}">Delete From Cart</a>
                            </div>
                            @if($one->product->count<$one->count)
                                <?php $available = false ;?>
                                <p style="color: red; font-weight: bold ; text-align: center">Too Much Only Available {{$one->product->count}} in Store</p>
                            @endif
                        </div>
                    @endforeach
                </div>
                @if($available)
                    <a href="{{route('buy')}}" class="buy">Buy</a>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>

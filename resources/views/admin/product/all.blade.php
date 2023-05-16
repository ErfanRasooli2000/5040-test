<head>
    <title>All Products</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table style="margin: 40px auto;">
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
            </div>
        </div>
    </div>

</x-app-layout>

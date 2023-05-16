<head>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title>add product</title>
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

                    <button class="save-product-btn" type="submit">Save Product</button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>

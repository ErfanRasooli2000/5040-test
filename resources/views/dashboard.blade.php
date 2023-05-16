<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 style="text-align: center; font-size: 20px ;margin: 10px">admin</h1>
                <div class="p-6 text-gray-900" style="display: flex; justify-content: center; flex-direction: column">
                    <a href="{{route('admin.product.add')}}">+ Add Product</a>
                    <a href="{{route('admin.product.all')}}">+ Product List</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 style="text-align: center; font-size: 20px ;margin: 10px">User</h1>
                <div class="p-6 text-gray-900" style="display: flex; justify-content: center; flex-direction: column">
                    <a href="{{route('user.products')}}">+ All Products</a>
                    <a href="{{route('user.cart')}}">+ My Cart</a>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-900'])

@section('content')
    <div class="row mx-2 mt-2 z-10">
        <h3 class="bg-gray-800 mt-2 rounded-3 py-2 pl-8 text-white">Blog Dashboard</h3>
        <div class="rounded-3 mb-4 bg-gray-800">
            <div class="table-responsive">
                <table class="table bg-gray-800 ml-5">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <tr class="text-white">
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->user_id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <form method="GET" action="/blogpost/update/{{ $item->id }}">
                                            @csrf
                                            <button class="btn btn-secondary">Update</button>
                                        </form>
                                        <form method="POST" action="/blogpost/delete/{{ $item->id }}">
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="flex items-center justify-center min-h-screen bg-gray-900">
                <div class="col-span-12">
                    <div class="overflow-auto lg:overflow-visible ">
                        <table class="table text-gray-400 border-separate space-y-6 text-sm">
                            <thead class="bg-gray-800 text-gray-500">
                                <tr>
                                    <th class="p-3">Brand</th>
                                    <th class="p-3 text-left">Category</th>
                                    <th class="p-3 text-left">Price</th>
                                    <th class="p-3 text-left">Status</th>
                                    <th class="p-3 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-800">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="rounded-full h-12 w-12  object-cover"
                                                src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80"
                                                alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">Appple</div>
                                                <div class="text-gray-500">mail@rgmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        Technology
                                    </td>
                                    <td class="p-3 font-bold">
                                        200.00$
                                    </td>
                                    <td class="p-3">
                                        <span class="bg-green-400 text-gray-50 rounded-md px-2">available</span>
                                    </td>
                                    <td class="p-3 ">
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                            <i class="material-icons-outlined text-base">visibility</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
                                            <i class="material-icons-round text-base">delete_outline</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-gray-800">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="rounded-full h-12 w-12   object-cover"
                                                src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                                                alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">Realme</div>
                                                <div class="text-gray-500">mail@rgmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        Technology
                                    </td>
                                    <td class="p-3 font-bold">
                                        200.00$
                                    </td>
                                    <td class="p-3">
                                        <span class="bg-red-400 text-gray-50 rounded-md px-2">no stock</span>
                                    </td>
                                    <td class="p-3">
                                        <a href="#" class="text-gray-400 hover:text-gray-100  mr-2">
                                            <i class="material-icons-outlined text-base">visibility</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
                                            <i class="material-icons-round text-base">delete_outline</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-gray-800">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="rounded-full h-12 w-12   object-cover"
                                                src="https://images.unsplash.com/photo-1600856209923-34372e319a5d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2135&q=80"
                                                alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">Samsung</div>
                                                <div class="text-gray-500">mail@rgmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        Technology
                                    </td>
                                    <td class="p-3 font-bold">
                                        200.00$
                                    </td>
                                    <td class="p-3">
                                        <span class="bg-yellow-400 text-gray-50  rounded-md px-2">start sale</span>
                                    </td>
                                    <td class="p-3">
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                            <i class="material-icons-outlined text-base">visibility</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
                                            <i class="material-icons-round text-base">delete_outline</i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

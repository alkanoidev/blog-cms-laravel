@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-900'])

@section('content')
    <div class="row mx-2 mt-2 z-10">
        <h3 class="bg-gray-800 mt-2 rounded-3 py-2 pl-8 text-white">Blog Dashboard</h3>
        <div class="rounded-3 mb-4 bg-gray-800">
            <div class="table-responsive">
                <table class="table table-stripped bg-gray-800 ml-5">
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
        </div>
    </div>
@endsection

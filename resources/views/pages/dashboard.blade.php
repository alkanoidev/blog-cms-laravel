@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

    <div class="row mt-4 mx-4 overflow-scroll">
        <div class="card mb-4">
            <table class="table ml-5">
                <thead>
                    <tr>
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
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="PUT" action="/blogpost/update/{{ $item->id }}">
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
@endsection

@isset($message)
    <div class="alert alert-success"> {{ $message }}</div>
@endisset

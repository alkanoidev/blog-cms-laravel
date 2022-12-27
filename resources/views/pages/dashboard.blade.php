@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

{{-- @include('layouts.navbars.auth.topnav') --}}
<a href="javascript:;" id="iconNavbarSidenav">
    <div class="sidenav-toggler-inner">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            width="25px" height="25px">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </div>
</a>

<table class="table ml-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">User Id</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
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
                    <form method="PUT" action="/blogpost/update/{{ $item->id }}">
                        @csrf
                        <button class="btn btn-secondary">Update</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="/blogpost/delete/{{ $item->id }}">
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@isset($message)
    <div class="alert alert-success"> {{ $message }}</div>
@endisset

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-900'])

@section('content')
    <div class="row mx-2 mt-3 z-10">
        <div class="col-12">
            <div class="card text-white bg-gray-800 mb-4">
                <div class="card-header bg-gray-800 pb-0">
                    <h6 class="text-white">Blog Dashboard</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7">#
                                    </th>
                                    <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7 ps-2">
                                        Title
                                    </th>
                                    <th class="text-center text-uppercase text-white text-xxs font-weight-bolder opacity-7">
                                        User</th>
                                    <th class="text-center text-uppercase text-white text-xxs font-weight-bolder opacity-7">
                                        Created At</th>
                                    <th class="text-center text-uppercase text-white text-xxs font-weight-bolder opacity-7">
                                        Updated At</th>
                                    <th class="text-center text-uppercase text-white text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr class="text-white table-row">
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->title }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->user_id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->created_at }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $item->updated_at }}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex gap-1 justify-content-center align-items-center">
                                                <form method="GET" class="m-0" action="/blogpost/update/{{ $item->id }}">
                                                    @csrf
                                                    <button class="btn btn-secondary m-0">Update</button>
                                                </form>
                                                <form method="POST" class="m-0" action="/blogpost/delete/{{ $item->id }}">
                                                    @csrf
                                                    <button class="btn btn-danger m-0">Delete</button>
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
        </div>
    </div>
@endsection

<style>
    .table-row {
        border-style: none !important;
        border-color: transparent;
        border-width: 0px;
    }

    .table-row:nth-child(even) {
        background-color: #252a2e;
        border-radius: 5px !important;
    }
    .card {
        box-shadow: none !important;
    }
</style>

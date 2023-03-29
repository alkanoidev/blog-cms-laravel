@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-900'])

@section('head')
    <link id="pagestyle" href={{ asset('assets/css/argon-dashboard.css') }} rel="stylesheet" />
@endsection

@section('content')
    <div class="row mx-2 mt-3 z-10">
        <div class="col-12">
            <div class="card text-white bg-gray-800 mb-4">
                <div class="card-header bg-gray-800 pb-0">
                    <h6 class="text-white">User Management</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7">Username
                                    </th>
                                    <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email
                                    </th>
                                    <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7">
                                        Create Date</th>
                                    <th class="text-center text-uppercase text-white text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="text-white table-row">
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->username }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->email }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->created_at }}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 gap-1 justify-content-center align-items-center">
                                                {{-- <a href="{{ route('user.delete', $user->id) }}"  class="btn btn-danger">Delete</a> --}}
                                                <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Delete</button>
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

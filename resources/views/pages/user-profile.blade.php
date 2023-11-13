@extends('layouts.admin', ['class' => 'g-sidenav-show bg-gray-900'])

@section('head')
    {{-- <link id="pagestyle" href={{ asset('assets/css/argon-dashboard.css') }} rel="stylesheet" /> --}}
@endsection

@section('content')
    <div class="card bg-gray-800 shadow-lg mx-2 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    {!! auth()->user()->avatar !!}
                </div>
                <div class="col-auto my-auto text-white">
                    <div class="h-100">
                        <h5 class="mb-1 text-white">
                            {{ auth()->user()->firstname ?? 'Firstname' }} {{ auth()->user()->lastname ?? 'Lastname' }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->username }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert" class="px-4">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card bg-gray-800">
                <form role="form" method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                    @csrf
                    <div class="card-header pb-0 bg-gray-800 text-white">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                        </div>
                    </div>
                    <div class="card-body text-white">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">Username</label>
                                    <input class="form-control" type="text" name="username"
                                        value="{{ old('username', auth()->user()->username) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">Email
                                        address</label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ old('email', auth()->user()->email) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">First name</label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="{{ old('firstname', auth()->user()->firstname) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">Last name</label>
                                    <input class="form-control" type="text" name="lastname"
                                        value="{{ old('lastname', auth()->user()->lastname) }}">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm text-white">Contact Information</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">Address</label>
                                    <input class="form-control" type="text" name="address"
                                        value="{{ old('address', auth()->user()->address) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">City</label>
                                    <input class="form-control" type="text" name="city"
                                        value="{{ old('city', auth()->user()->city) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">Country</label>
                                    <input class="form-control" type="text" name="country"
                                        value="{{ old('country', auth()->user()->country) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">Postal
                                        code</label>
                                    <input class="form-control" type="text" name="postal"
                                        value="{{ old('postal', auth()->user()->postal) }}">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">About me</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-white">About me</label>
                                    <input class="form-control" type="text" name="about"
                                        value="{{ old('about', auth()->user()->about) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<style scoped>
    svg {
        height: 4rem;
        width: 4rem;
        border-radius: .5rem;
    }
</style>

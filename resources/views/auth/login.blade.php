@extends('layouts.app', ['title' => 'Login'])

@section('head')
    <link id="pagestyle" href={{ asset('assets/css/argon-dashboard.css') }} rel="stylesheet" />
@endsection

@section('content')
    {{-- <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>  --}}
    <main class="main-content mt-0">
        <section>
            <div class="page-header vh-100">
                <div class="container">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="card">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('login.perform') }}">
                                    @csrf
                                    @method('post')
                                    <div class="flex flex-col mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            aria-label="Email">
                                        @error('email')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            aria-label="Password">
                                        @error('password')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">Sign
                                            in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-1 text-sm mx-auto">
                                    Forgot you password? Reset your password
                                    <a href="{{ route('reset-password') }}"
                                        class="text-gradient-dark font-weight-bold">here</a>
                                </p>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="text-gradient-dark font-weight-bold">Sign
                                        up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

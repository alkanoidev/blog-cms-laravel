@extends('layouts.admin', ['class' => 'g-sidenav-show bg-gray-900'])

{{-- @section('head')
    <link id="pagestyle" href={{ asset('assets/css/argon-dashboard.css') }} rel="stylesheet" />
@endsection --}}

@section('content')
    {{-- @include('layouts.navbars.guest.navbar') --}}
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">Register as a writer and wait for the administration to approve!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0 text-white bg-gray-800">
                        <div class="card-header text-center pt-4 pb-0 text-white bg-gray-800">
                            <h4 class="text-white">Register</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                <div class="flex flex-col mb-3">
                                    <label for="email" class="text-light">First Name</label>
                                    <input type="text" name="firstname" class="form-control" aria-label="Name"
                                        value="{{ old('firstname') }}">
                                    @error('firstname')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="email" class="text-light">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" aria-label="Name"
                                        value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="email" class="text-light">Email</label>
                                    <input type="email" name="email" class="form-control" aria-label="Email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="email" class="text-light">Password</label>
                                    <input type="password" name="password" class="form-control" aria-label="Password">
                                    @error('password')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault">
                                    <label class="form-check-label text-light" for="flexCheckDefault">
                                        I agree the <a href="javascript:;" class="text-primary font-weight-bold">Terms and
                                            Conditions</a>
                                    </label>
                                    @error('terms')
                                        <p class='text-danger text-xs'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary w-100 my-4 mb-2">Sign up</button>

                                    @include('components.alert')
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                        class="text-primary font-weight-bold">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection

<style>
    /* Hide the default checkbox */
    .container1 input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .container1 {
        display: flex;
        gap: 10px;
    }


    /* Create a custom checkbox */
    .checkmark {
        position: relative;
        box-shadow: rgb(255, 84, 0) 0px 0px 0px 2px;
        background-color: rgba(16, 16, 16, 0.5);
        height: 20px;
        width: 20px;
        margin-right: 10px;
        flex-shrink: 0;
        margin-top: -1px;
        transition: all 0.2s ease 0s;
        cursor: pointer;
        transform-origin: 0px 10px;
        border-radius: 4px;
        margin: -1px 10px 0px 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    .container1 input:checked~.checkmark {
        box-shadow: rgb(255, 84, 0) 0px 0px 0px 2px;
        background-color: rgba(245, 24, 24, 0.5);
        height: 20px;
        width: 20px;
        margin-right: 10px;
        flex-shrink: 0;
        margin-top: -1px;
        transition: all 0.2s ease 0s;
        cursor: pointer;
        transform-origin: 0px 10px;
        border-radius: 4px;
        margin: -1px 10px 0px 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .container1 input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container1 .checkmark:after {
        left: 0.45em;
        top: 0.25em;
        width: 0.25em;
        height: 0.5em;
        border: solid white;
        border-width: 0 0.15em 0.15em 0;
        transform: rotate(45deg);
        transition: all 500ms ease-in-out;
    }
</style>

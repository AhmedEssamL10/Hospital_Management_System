{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- admin key -->
        <div>
            <x-input-label for="admin_key" :value="__('Admin key')" />
            <x-text-input id="admin_key" class="block mt-1 w-full" type="text" name="admin_key" :value="old('admin_key')"
                required autofocus autocomplete="admin_key" />
            <x-input-error :messages="$errors->get('admin_key')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('dashboard.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('dashboard/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">Get Started</h2>
                                        <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.
                                        </h5>
                                        @if (session('errorResponse'))
                                            <div class="alert alert-danger">
                                                <strong>{{ session('errorResponse') }}</strong>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('admin.register.store') }}">
                                            @csrf
                                            <div class="form-group">

                                                <label>Fullname</label> <input class="form-control"
                                                    placeholder="Enter your Fullname" type="text" name="name"
                                                    :value="old('name')" required autofocus autocomplete="name">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <label>Admin key</label> <input class="form-control" placeholder="Admin key"
                                                    type="text" name="admin_key" :value="old('admin_key')" required
                                                    autofocus autocomplete="admin_key" />
                                                <x-input-error :messages="$errors->get('admin_key')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label> <input class="form-control"
                                                    placeholder="Enter your email" type="email" name="email"
                                                    :value="old('email')" required autocomplete="username">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label> <input class="form-control"
                                                    placeholder="Enter your password" type="password" name="password"
                                                    required autocomplete="new-password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Password Confirmation</label> <input class="form-control"
                                            placeholder="Enter your password" type="password" name="password_confirmation"
                                            required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <button class="btn btn-main-primary btn-block">Create Account</button>
                                    <div class="row row-xs">
                                        <div class="col-sm-6">
                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup
                                                with Facebook</button>
                                        </div>

                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                            <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>
                                                Signup with Twitter</button>
                                        </div>

                                    </div>
                                    </form>
                                    <div class="main-signup-footer mt-5">
                                        <p>Already have an account? <a href="{{ url('/' . ($page = 'signin')) }}">Sign
                                                In</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
    </div>
@endsection
@section('js')
@endsection

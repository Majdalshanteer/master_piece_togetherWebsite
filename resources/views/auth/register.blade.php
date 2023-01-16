
@extends('pages.layout.master')


@section('content')

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="registerstyle/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="registerstyle/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-color:#fdf0e8">
			<div class="inner">
				<div class="image-holder">
					<img src="registerstyle/images/2.jpg" alt="">
				</div>
				<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
					<h3>Registration Form</h3>

					<div class="form-wrapper">
						<input id="name"  type="text" name="name" :value="old('name')" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"  style="color:red" />
					</div>
					<div class="form-wrapper">
						<input  placeholder="Email Address" class="form-control" id="email"  type="email" name="email" :value="old('email')" >
						  <x-input-error :messages="$errors->get('email')" class="mt-2 " style="color:red" />
                            <i class="zmdi zmdi-email"></i>

					</div>
					<div class="form-wrapper">
						<input  placeholder="Mobile number " class="form-control" id="phone"  type="phone" name="phone" :value="old('phone')" >
						  <x-input-error :messages="$errors->get('phone')" class="mt-2 " style="color:red" />
                            <i class="zmdi zmdi-phone"></i>

					</div>
					<div class="form-wrapper">

                        {{-- <input type="file" name="image" class="form-control" id="exampleInputFile" :value="old('image')"> --}}
						{{-- <input  placeholder="Mobile number " class="form-control" id="phone"  type="phone" name="phone" :value="old('phone')" > --}}
						  {{-- <x-input-error :messages="$errors->get('image')" class="mt-2 " style="color:red" /> --}}
                            {{-- <i class="zmdi zmdi-image"></i> --}}

					</div>
					{{-- <div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div> --}}
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control"
                       id="password"

                        name="password"
                        autocomplete="new-password" >
						<i class="zmdi zmdi-lock"></i>
                        <x-input-error :messages="$errors->get('password')" class="mt-1"  style="color:red" />
					</div>
					<div class="form-wrapper">
						<input placeholder="Confirm Password" class="form-control"    id="password_confirmation"
                        type="password"
                        name="password_confirmation"  >
						<i class="zmdi zmdi-lock"></i>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1"   style="color:red"/>
					</div>


                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button>

                            {{ __('Register') }}
                            <i class="zmdi zmdi-arrow-right"></i>
                        </button>




					{{-- <button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button> --}}
				</form>
			</div>
		</div>




@endsection

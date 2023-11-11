@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 mt-3 rounded-md w-6/12 text-center">
            @if (session('status'))
                <div class="text-white bg-red-500 font-extrabold rounded-md p-3">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" placeholder="Your Email"
                        class="bg-gray-100 mt-2 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" />
                </div>
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" placeholder="Your Password"
                        class="bg-gray-100 mt-2 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}" />
                </div>
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2" />
                    <label for="remember">Remember Me</label>
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection

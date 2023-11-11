@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-md mt-3">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" placeholder="Your Name"
                        class="bg-gray-100 mt-2 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" />
                </div>
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" placeholder="Your Username"
                        class="bg-gray-100 mt-2 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}" />
                </div>
                @error('username')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
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
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" placeholder="Your Password Again"
                        class="bg-gray-100 mt-2 border-2 w-full p-4 rounded-lg"
                        value="" />
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

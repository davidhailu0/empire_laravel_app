@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 rounded-md w-6/12 mt-3">
            <form action="{{ route('product') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Post</label>
                    <textarea placeholder="Post Something!" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="body" id="body"
                        cols="30" rows="6"></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection

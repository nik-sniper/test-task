@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] ">
        <div class="min-h-screen flex items-center justify-center">
            <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-bold text-center mb-6 text-gray-700">Registration Form</h3>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('username') }}" required>
                        @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                        <input type="text" id="phone" name="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('phone') }}" required>
                        @error('phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Register
                        </button>
                    </div>
                </form>

                @if (session('link'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        <p>Your generated link:</p>
                        <a href="{{ session('link') }}" class="text-bold">{{ session('link') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

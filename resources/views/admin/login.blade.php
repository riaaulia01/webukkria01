@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4"><div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

    <div class="text-center mb-6">

        <div class="text-4xl mb-3">
            🔐
        </div>

        <h2 class="text-2xl font-bold text-gray-800">
            Login Admin
        </h2>

        <p class="text-gray-500 mt-1">
            Silakan masuk ke halaman admin
        </p>

    </div>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.login.proses') }}" method="POST">

        @csrf

        <div class="mb-4">

            <label class="block font-semibold mb-2">
                Username
            </label>

            <input
                type="text"
                name="username"
                class="w-full border rounded-lg px-4 py-3"
                placeholder="Masukkan username"
                required>

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="w-full border rounded-lg px-4 py-3"
                placeholder="Masukkan password"
                required>

        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">

            Login Admin

        </button>

    </form>

</div>

</div>@endsection
@extends('layouts.main')
@section('title', 'Payment')

@section('content')
    <div class="bg-gray-50  w-screen h-screen ">
        <div class="bg-gray-50  h-screen flex flex-col justify-center items-center  md:mx-auto">
            <svg viewBox="0 0 24 24" class="w-16 h-16 mx-auto my-6">
                <circle cx="12" cy="12" r="12" fill="red" />
                <path fill="none" stroke="white" stroke-width="2" d="M6 6l12 12M18 6l-12 12" />
            </svg>

            <div class="text-center">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Cancelled</h3>
                <p class="text-gray-600 my-2">Payment could not be processed.</p>
                <p>Please try again or contact support if you need assistance.</p>
                <div class="py-10 text-center">
                    <a href="{{ route('user.flights') }}"
                        class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                        GO BACK
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection

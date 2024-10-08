@extends('layouts.main')
@extends('Components.navbar')
@section('title', 'Sign in')

@section('navbarbtns')
    <div class="flex space-x-4">

        <a href="{{ route('view.signin') }}"
            class="bg-blue-500 px-3 py-2 font-semibold text-white border-2 border-blue-500 
                            rounded shadowtransition-all duration-900 ease-in-out hover:bg-transparent
                             hover:text-blue-500 hover:border-blue-500">Sign
            in</a>
        <a href="{{ route('view.signup') }}"
            class="bg-blue-400 px-3 py-2 font-semibold text-white border-2 border-blue-400 
                            rounded shadowtransition-all duration-900 ease-in-out hover:bg-transparent
                             hover:text-blue-400 hover:border-blue-400">Sign
            up</a>
    </div>
@endsection

@section('content')
    <div class="bg-white relative py-4 w-screen">
        <div
            class="flex flex-col items-center justify-between pt-0 pr-10 pb-0 pl-10 mt-0 mr-auto mb-0 ml-auto max-w-7xl
      xl:px-5 lg:flex-row">
            <div class="flex flex-col items-center w-full  pr-10 pb-20 pl-10 lg:pt-4 lg:flex-row">
                <div class="w-full bg-cover relative max-w-md lg:max-w-2xl lg:w-7/12">
                    <div class="flex flex-col items-center justify-center w-full h-full relative lg:pr-10">
                        <img src="https://res.cloudinary.com/macxenon/image/upload/v1631570592/Run_-_Health_qcghbu.png"
                            class="btn-" />
                    </div>
                </div>


                <div class="w-full mt-20 mr-0 mb-0 ml-0 relative z-10 max-w-2xl lg:mt-0 lg:w-5/12">
                    <div
                        class="flex flex-col items-start justify-start pt-10 pr-10 pb-10 pl-10 bg-white shadow-2xl rounded-xl
                    relative z-10">
                        <p class="w-full text-4xl font-medium text-center leading-snug font-serif">Sign in</p>
                        <form class="w-full mt-6 mr-0 mb-0 ml-0 relative space-y-8" action="{{ route('signin') }}"
                            method="post">

                            @csrf
                            <div class="relative">
                                <p
                                    class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">
                                    Email</p>
                                <input placeholder="123@ex.com" type="text" required name="email"
                                    class="border-2 placeholder-gray-400 focus:outline-none
                  focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                  @error('email') border-red-600 @enderror rounded-md" />
                                <span class="text-red-600">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="relative">
                                <p
                                    class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600
                  absolute">
                                    Password</p>
                                <input placeholder="Password" type="password" required name="password"
                                    class="border-2 @error('password') border-red-600 @enderror placeholder-gray-400 focus:outline-none
                  focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                  rounded-md" />
                                <span class="text-red-600">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="relative">
                                <button type="submit"
                                    class="w-full inline-block pt-4 pr-5 pb-4 pl-5 text-xl font-medium text-center text-white bg-indigo-500
                  rounded-lg transition duration-200 hover:bg-indigo-600 ease">Submit</button>
                            </div>
                            <div class="relative flex items-center justify-center">
                                <a href="{{ route('view.signup') }}" class="text-blue-700 hover:underline"> Don't have
                                    an
                                    account sign up</a>

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection










@extends('Components.footer')

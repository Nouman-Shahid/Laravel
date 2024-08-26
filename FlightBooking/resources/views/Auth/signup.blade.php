@extends('layouts.main')
@extends('Components.navbar')
@section('title', 'Sign up')


@section('content')
    <div class="bg-white relative">
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
                        <p class="w-full text-4xl font-medium text-center leading-snug font-serif">Sign up</p>
                        <form class="w-full mt-6 mr-0 mb-0 ml-0 relative space-y-8" action="{{ route('signup') }}"
                            method="POST">
                            @csrf

                            <div class="relative">
                                <p
                                    class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600
                  absolute">
                                    Name</p>
                                <input placeholder="John" name="name" type="text" required
                                    class="border placeholder-gray-400 focus:outline-none
                  focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                  border-gray-300 rounded-md" />
                            </div>
                            <div class="relative">
                                <p
                                    class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">
                                    Email</p>
                                <input placeholder="123@ex.com" type="text" name="email" required
                                    class="border placeholder-gray-400 focus:outline-none
                  focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                  border-gray-300 rounded-md" />
                            </div>
                            <div class="relative">
                                <p
                                    class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">
                                    Password</p>
                                <input placeholder="password" type="password" name="password" required
                                    class="border placeholder-gray-400 focus:outline-nonefocus:border-black w-full pt-4 pr-4 pb-4 pl-4
                                     mt-2 mr-0 mb-0 ml-0 text-base block bg-white border-gray-300 rounded-md" />
                            </div>

                            <div class="relative">
                                <button type="submit"
                                    class="w-full inline-block pt-4 pr-5 pb-4 pl-5 text-xl font-medium text-center text-white bg-indigo-500
                  rounded-lg transition duration-200 hover:bg-indigo-600 ease">Submit</button>
                            </div>
                            <div class="relative flex items-center justify-center">
                                <a href="{{ route('view.signin') }}" class="text-blue-700 hover:underline"> Already have
                                    an
                                    account sign in</a>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection










@extends('Components.footer')
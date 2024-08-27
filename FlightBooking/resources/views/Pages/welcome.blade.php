@extends('layouts.main')
@extends('Components.navbar')
@section('title', 'Home')



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
    <div class="flex flex-col w-screen bg-slate-100 h-screen justify-start items-center ">

        <div class="flex flex-wrap">
            <div class="w-screen sm:w-8/12 mb-10">
                <div class="container mx-auto h-full sm:p-10">
                    <nav class="flex px-4 justify-between items-center">
                        <div class="text-4xl font-bold">Plan Your Flight<span class="text-blue-500">.</span>
                        </div>
                        <div>
                            <img src="https://image.flaticon.com/icons/svg/497/497348.svg" alt="" class="w-8">
                        </div>
                    </nav>
                    <header class="container px-4 lg:flex mt-10 items-center h-full lg:mt-0">
                        <div class="w-full">
                            <h1 class="text-4xl lg:text-6xl font-bold">Effortless Visa Assistance for Your Next<span
                                    class="text-blue-400"> Adventure! </span></h1>
                            <div class="w-20 h-2 bg-blue-400 my-4"></div>
                            <p class="text-xl mb-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae
                                maiores
                                neque eaque ea odit placeat, tenetur illum distinctio nulla voluptatum a corrupti beatae
                                tempora
                                aperiam quia id aliquam possimus aut.</p>
                            <a class="bg-blue-500 text-white text-2xl border-2 border-blue-500 font-medium px-4 py-2 
                            rounded shadowtransition-all duration-900 ease-in-out hover:bg-transparent
                             hover:text-blue-500 hover:border-blue-500"
                                href="{{ route('view.signin') }}"">
                                Book Flight
                            </a>

                        </div>
                    </header>
                </div>
            </div>
            <img src="https://images.pexels.com/photos/62623/wing-plane-flying-airplane-62623.jpeg?cs=srgb&dl=pexels-pixabay-62623.jpg&fm=jpg"
                alt="Leafs" class="w-full h-48 object-cover sm:h-screen sm:w-4/12">
        </div>
    </div>
@endsection


@extends('Components.footer')

@section('navbar')
    <nav class="flex h-[10vh] w-screen justify-between items-center bg-slate-100 px-7 py-3 ring-2 ring-gray-200 ring-inset">

        <div class="flex justify-center space-x-3 items-center">
            <a href="{{ route('view.home') }}"><img src="images/fav-icon/logo.png" class="size-[7vh]"></a>
            <a class="text-[4vh] font-bold text-blue-400" href="{{ route('view.home') }}">AirPlan</a>
        </div>


        <div class="flex space-x-8 text-[2.8vh] font-semibold">
            <a href="{{ route('view.home') }}">Home</a>
            <a href="">About</a>
            <a href="">Contact us</a>
        </div>


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


    </nav>
@endsection

@section('footer')
    <footer
        class="flex flex-col h-auto w-screen justify-between items-center bg-slate-100 px-7 py-3 space-y-3 ring-2 ring-gray-200 ring-inset">

        <div class="flex justify-center space-x-3 items-center">
            <h2 class="text-[3vh] font-bold text-blue-400">AirPlan</h2>
        </div>


        <div class="flex space-x-8 text-[2vh] font-semibold">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Contact us</a>
        </div>


        <div class="flex space-x-8">
            <img src="images/social-icons/facebook.png" class="size-[4vh] cursor-pointer">
            <img src="images/social-icons/instagram.png" class="size-[4vh] cursor-pointer">
            <img src="images/social-icons/google.png" class="size-[4vh] cursor-pointer">

        </div>

        <div class="flex">
            <p class="font-bold">© 2024 All rights reserved : AirPlan</p>
        </div>

    </footer>
@endsection

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<center>
    <div class="max-w-xl py-6 px-8 h-100 mt-20 bg-white rounded shadow-xl">
        <form action="{{url('/')}}/register" method="post">
     @csrf
    <div class="mb-6">
      <label  class="block text-gray-800 font-bold">Name:</label>
      <input type="text" name="name" id="name" placeholder="username" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
    </div>
    <div>
      <label class="block text-gray-800 font-bold">Email:</label>
      <input type="text" name="email" id="email" placeholder="@email" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
    </div>
      <div class="mb-6">
      <label class="block text-gray-800 font-bold">Password:</label>
      <input type="password" name="password" id="name" placeholder="password" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
         <a href="#" class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600">Forget Password</a>
    </div>
    <button type="submit" class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded">Login</button>
  </form>
</div>
</center>


</body>
</html>
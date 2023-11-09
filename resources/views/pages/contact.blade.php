@extends('layouts.app')


@section('content')
	<x-frontend_header/>

    <main class="bg-[url('/assets/bg3.jpeg')]  bg-cover bg-center py-[5rem] min-h-[100svh] origin-bottom items-center z-50 ">

        
<section class=" min-h-screen flex items-center justify-center">
    <div class="bg-gray-900 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-2xl font-bold text-gray-50 mb-6">Contact Us</h1>
        <form action="#" method="post">
             <div class="relative z-0 w-full mb-6 group">
              <input
              type="text"
              name="firstname"
              id="floating_first_name"
              class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 ppearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer"
              placeholder=" "
              required
          
              />
              <label
              for="floating_first_name"
              class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Name</label
              >
          </div>
            <div class="relative z-0 w-full mb-6 group">
              <input
              type="email"
              name="firstname"
              id="floating_first_name"
              class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 ppearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer"
              placeholder=" "
              required
            
              />
              <label
              for="floating_first_name"
              class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Email</label
              >
          </div>
             <div class="relative z-0 w-full mb-6 group">
           
              <textarea  required class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 ppearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer">
                  
              </textarea>
              <label
              for="floating_first_name"
              class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Message</label
              >
          </div>
            <button type="submit" class="bg-indigo-500 text-white p-2 rounded-lg font-semibold w-full hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">Send</button>
        </form>
        {{-- <div class="mt-4 text-sm text-gray-600">
            If you prefer not to use web forms, you can reveal our email address on <a href="https://veilmail.io/e/FkKh7o" class="underline" target="_blank">veilmail.io/e/FkKh7o</a>.
        </div> --}}
    </div>
</section>


    </main>
@endsection

@section('scripts')


<script>
    
    const dropdownUserAvatarButton = document.querySelector('#dropdownUserAvatarButton');
    const dropdownAvatar = document.querySelector('#dropdownAvatar');
    dropdownUserAvatarButton.addEventListener('click',function(){

        dropdownAvatar.classList.toggle('hidden')
    })
</script>
@endsection
@extends('layouts.app')


@section('content')
        {{-- header --}}
       <x-frontend_header/>

        {{--  hero --}}
        <main class="max-h-[96svh] overflow-hidden">
            <img src="{{ asset('assets/hero.jpg') }}" class="object-cover " alt="">
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
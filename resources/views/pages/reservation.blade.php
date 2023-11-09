@extends('layouts.app')


@section('content')
<x-frontend_header/>
<main class="bg-[url('/assets/bg3.jpeg')] bg-cover bg-center pb-[5rem] pt-[7rem] min-h-[100svh] origin-bottom items-center z-50 px-3 ">

    <frontend_reservation data="{{$offer}}" user="{{Auth::user()}}"></frontend_reservation>

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
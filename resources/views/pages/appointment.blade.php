@extends('layouts.app')

@section('content')
<x-frontend_header/>
<main class="bg-[url('/assets/bg3.jpeg')] bg-cover bg-center pb-[5rem] pt-[7rem] min-h-[100svh] origin-bottom items-center z-50 px-3 ">

    <div  class="grid grid-cols-1 lg:w-4/5 px-10  mx-auto py-10 bg-black bg-opacity-90">
          <h1 class="pb-10 font-bold">User Appointment History</h1>
       @if(session()->has('success'))
        <div class="p-4 mb-10 text-sm rounded-lg  bg-gray-800 text-green-400" role="alert">
          <span class="font-medium">Updated Successfully!</span> 
        </div>
       @endif
        @csrf
     <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left  text-gray-400">
                        <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                     Photo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Branch Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Branch Location
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   Status
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @forelse($appointments as $appointment)
                             <tr class=" border-b bg-gray-900 border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                       {{$appointment->postInfo->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset($appointment->postInfo->photo) }}" class="h-[4rem] w-[4rem]" loading="lazy"
                                            alt="">
                                    </td>
                                    <td class="px-6 py-4">
                                       {{$appointment->postInfo->category}}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{ $appointment->branchInfo->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{$appointment->branchInfo->location}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($appointment->status == 1)
                                            <span class=" text-xs font-medium mr-2 px-2.5 py-0.5 rounded bg-green-900 text-green-300">Approved</span>
                                        @elseif ($appointment->status == 0)
                                            <span class=" text-xs font-medium mr-2 px-2.5 py-0.5 rounded bg-yellow-900 text-yellow-300">Pending</span>
                                        @else
                                            <span class=" text-xs font-medium mr-2 px-2.5 py-0.5 rounded bg-red-900 text-red-300">Cancelled</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                       {{--  <branch_edit owners="{{ $owners }}" data="{{ $branch }}">

                                        </branch_edit owners="{{ $owners }}"> --}}
                                        @if($appointment->status != 2 && $appointment->status != 1)
                                            <a href="/appointment/{{$appointment->id}}" class="text-red-500 font-bold">Cancel</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty

                                <h1 class="text-red-500 font-bold text-2xl">No result!</h1>
                            @endforelse



                 

                        </tbody>
                    </table>
                    <div class="py-5 px-1">
                        {{-- {{ $branches->links('pagination::tailwind') }} --}}
                    </div>
                </div>

</div>

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
@extends('layouts/admin')


@section('content')
    <x-admin_aside />

    <div class="p-4 sm:ml-64">
        <div class="p-4 ">
           <!-- Breadcrumb -->
           <nav class="flex px-5 py-3  text-gray-700 border  rounded-lg bg-gray-800 border-gray-700"
           aria-label="Breadcrumb">
           <ol class="inline-flex items-center space-x-1 md:space-x-3">
               <li class="inline-flex items-center">
                   <a href="/admin/dashboard"
                       class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-white">
                       <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                           fill="currentColor" viewBox="0 0 20 20">
                           <path
                               d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                       </svg>
                       Dashboard
                   </a>
               </li>


           </ol>
       </nav>


       {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d123552.91083709442!2d121.10379569530986!3d14.597453973598652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sbarber%20shop%20antipolo!5e0!3m2!1sen!2sph!4v1699368737989!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}


       <div class="" style="
      height: 65vh;
      overflow: hidden;
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
    ">
  <div style="
        position: absolute;
        bottom: 0;
        height: 100%;
        width: calc(100vw + 600px);
      ">
{{--     <iframe class="border-card" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1877201.646144031!2d91.52807767106037!3d23.228182322195394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x374d0bd19f3f36f7%3A0xb1f62692a3d5e474!2sMizoram!5e0!3m2!1sen!2sin!4v1681814341442!5m2!1sen!2sin"
      width="100%" height="100%" allowfullscreen="" loading="lazy"></iframe> --}}
      <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d123552.91083709442!2d121.10379569530986!3d14.597453973598652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sbarber%20shop%20antipolo!5e0!3m2!1sen!2sph!4v1699368737989!5m2!1sen!2sph" width="100%" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
        </div>
    </div>
@endsection
@section('scripts')

<script>
    const d = document.querySelector('#logo-sidebar');
    const navBtn = document.querySelector('#navBtn');

    navBtn.addEventListener('click', function (){
        console.log(d.classList.toggle('-translate-x-full'))
    })
    google.maps.event.addListener(marker, "click", function() {
   window[data.funkcija]();
});
</script>
@endsection


@extends('layouts.app')
@section('content')

<script>
    AOS.init();
</script>

<div class = "container">
  <!-- Section: Testimonial cards -->
  <section class="text-center my-3 p-1">

    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold my-4">Orthodontists</h2>
    <!-- Section description -->
    <p class="dark-grey-text w-responsive mx-auto mb-5">Take care of your teeth.</p>
    
    @php
      $cardElement = 0;
      $currentElement = 0;
      $aosDelayIncreaser = 100
    @endphp
    @foreach($orthodontists as $orthodontist)
      @php
        $cardElement++;
        $currentElement++
      @endphp
      @if($cardElement == 1)
        @if(count($orthodontists) > 3 && $currentElement + 2 < count($orthodontists))
        <!-- Grid row -->
        <div class="row d-flex justify-content-center mb-4">
        @else 
        <div class="row d-flex justify-content-center mb-5">
        @endif
      @endif

      <!--Grid column-->
      <div class="child col-md-4">
        <!--Card-->
        <div class="card testimonial-card" id="testimonialCard" data-aos="fade-up" data-aos-once="false" data-aos-delay=@php echo $aosDelayIncreaser; $aosDelayIncreaser+=400 @endphp data-aos-duration="1000">
          <!--Background color-->
          <div class="card-up info-color"></div>
          <!--Profile picture-->
          <div class="avatar mx-auto white">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle img-fluid">
          </div>
          <div class="card-body">
            <!--Name-->
            <h4 class="font-weight-bold mb-2">{{ $orthodontist->first_name }} {{ $orthodontist->last_name }}</h4>
            <!--Years of experience-->
            <h6 class="font-weight-bold mb-2">29</h6>
            <hr>
            <!--Graduated at / Short quote-->
            <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet eos
              adipisci, consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>

      @if($cardElement == 3)
        </div>
        @php
        $cardElement = 0;
        @endphp
      @endif
    @endforeach

  </section>

</div>

@endsection
@extends('layouts.app')
@section('content')

<div class="container">
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

</div>

@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <!-- Section: Block Content -->
    <section class="text-center my-3">
        <!-- Card -->
        <div class="card testimonial-card">

            <br>
            <!-- Profile image -->
            <div class="avatar text-center white">
            @if($user->profile_img != null)
              <img src="../public/profile_images/{{$user->profile_img}}" class="rounded-circle" alt="profileImg">
              @else
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle" alt="profileImg">
              @endif
                <br> <br>
                <!-- Change profile image -->
                <span class="uploadImg">
                    <i class="fas fa-cloud-upload-alt" id="btnShowImgForm" style="font-size:30px;color:rgba(242, 68, 82)" aria-hidden="true" type="button"></i>
                </span>
            </div>

            <!-- Form to change profile img -->
            <form class="ImgForm md-form mx-2" action="{{ url('/updateImg') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="newImg" name="newImg">
                    <label class="custom-file-label fileName" for="newImg">Choose image</label>
                </div>


                <div class="submitBtn text-center mt-3">
                    <button type="submit" class="btn text-center" id="saveImg">Update Profile Picture</button>
                </div>
            </form>

            <!-- Background color dark default-color -->
            <div class="card-up p-3 white-text nameSpecialty text-center">
            <!-- ! TEXT BIGGER ! -->
               <!-- Name -->
              <h2 class="doctorName">{{$user->first_name}} {{ $user->last_name }}</h2>
               <!-- Specialist category -->
              <h5 class="doctorType">{{$user->specialty}}</h5>
            </div>

            <!-- Content -->
            <div class="card-body px-3 py-4">
                <div class="row">

                    <!-- Likes -->
                    <div class="col-4 text-center">
                    <p class="font-weight-bold mb-0">4300</p>
                    <p class="small text-uppercase mb-0">Likes</p>
                    </div>

                    <!-- Appointments -->
                    <div class="col-4 text-center border-left border-right">
                    <p class="font-weight-bold mb-0">12000</p>
                    <p class="small text-uppercase mb-0">Appointments</p>
                    </div>

                    <!-- Dislikes -->
                    <div class="col-4 text-center">
                    <p class="font-weight-bold mb-0">27</p>
                    <p class="small text-uppercase mb-0">Disklikes</p>
                    </div>

                </div>

                <!-- Availability: -->
                <!-- <hr class="my-4"> -->
                <!-- <p class="lead"><strong>Today's availability</strong></p> -->
                <!-- <div class="chip deep-purple white-text mr-0">7:30PM</div> -->

                <!-- <div class="collapse-content"> -->

                    <!-- Text -->
                    <!-- <p class="card-text collapse" id="collapseContent">Recently, we added several exotic new dishes to our restaurant menu. They come from countries such as Mexico, Argentina, and Spain. Come to us, have some delicious wine and enjoy our juicy meals from around the world.</p> -->
                    <!-- Button -->
                    <!-- <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent"></a> -->

                <!-- </div>  -->
            </div>

            <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                       <button class="nav-link default-color" id="connectedServices" data-toggle="tab" role="tab" aria-controls="connectedServices" aria-selected="false">Edit</button>
                                   </li>

                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

                                      <form class="" id="profileForm" action="{{ route('doctor.updateProfile') }}" method="post">

                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Age</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                              <input name="age" class="form-control-plaintext" id="dage" value='{{$doctor->age}}'>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Years of experience</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                              <input  name="years_of_experience" class="form-control-plaintext"  id="yoe" value='{{$doctor->years_of_experience}}'>
                                            </div>
                                        </div>
                                        <hr />


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Biography</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                              <input  name="biography" class="form-control-plaintext" id="biography" value='{{$doctor->biography}}' >
                                            </div>
                                        </div>
                                      </form>
                                        <hr />

                                    </div>

        </div>
    </section>

</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>
  @endforeach
  @endif
  <!-- Default form contact -->
  <form class="text-center border border-light p-5" action="{{ route('admin.createDoctor') }}" method="post">
    {{ csrf_field() }}

    <p class="h4 mb-4">Add doctor's information</p>
    <label class=" h5 mb-4" for="">{{ $user->first_name}}  {{ $user->last_name}}</label>

    <textarea type="text" class="form-control mb-4" name="biography" placeholder="Biography"></textarea>

    <div class="form-row mb-4">
        <div class="col">
          <input type="text" class="form-control mb-4" name="years_of_experience" placeholder="Years of experience">
        </div>
    <div class="col">
      <input type="text" class="form-control mb-4" name="age" placeholder="Age">
    </div>
    </div>
    <input type="text" class="form-control mb-4" name="userid" value="{{$user->id}}">

    <!-- Subject -->
    <label>Specialty</label>
    <select name="spec_id" class="browser-default custom-select mb-4">
        <option value="" disabled>Choose option</option>
        @foreach ($specialties as $specialty)
        <option value="{{$specialty->id}}">{{$specialty->name}}</option>
        @endforeach
    </select>

    <!-- Send button -->
    <button class="btn btn-info pl-5 pr-5" type="submit">Save</button>

</form>
<!-- Default form contact -->
</div>
@endsection

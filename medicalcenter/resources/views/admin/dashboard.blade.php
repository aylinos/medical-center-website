@extends('layouts.app')

@section('content')
<div class="container-fluid">
  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>
  @endforeach
  @endif

  <!-- You are logged in! Admin: {{ Auth::user()->first_name }} -->

  @if (session('successMsg'))
  <div class="alert alert-success" role="alert">
    {{ session('successMsg')}}
  </div>
  @endif
  <div class="row mr-5 ml-5">
      <div class="col-6 mr-5 ml-5">
          <div class="card">
              <div class="card-header">Users</div>

              <div class="allUsers">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">First name</th>
                      <th scope="col">Last name</th>
                      <th scope="col">Role</th>
                      <th scope="col">Make doctor</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <th scope="row">{{ $user->first_name}}</th>
                      <th scope="row">{{ $user->last_name}}</th>
                      <th scope="row">{{ $user->role_id}}</th>

                      <td>

                        <form id="change-form-{{ $user->id}}" action="{{ route('admin.makedoctor', $user->id)}}" method="get" style="display:none;">
                        </form>
                        <button
                        onclick="if (confirm('Are you sure you want to make this person a doctor?'))
                        {
                          event.preventDefault();
                          document.getElementById('change-form-{{ $user->id}}').submit();
                        }else{
                          event.preventDefault();
                        } "
                        class="btn btn-raised btn-primary btn-sm"> <i class="fa fa-user-md" aria-hidden="true"></i></button>

                        ||
                        <form id="deleteuser-form-{{ $user->id}}" action="{{ route('admin.deleteuser', $user->id)}}" method="post" style="display:none;">
                          {{ csrf_field() }}
                          {{ method_field('delete')}}
                        </form>
                        <button
                        onclick="if (confirm('Are you sure you want to delete this user?'))
                        {
                          event.preventDefault();
                          document.getElementById('deleteuser-form-{{ $user->id}}').submit();
                        }else{
                          event.preventDefault();
                        } "
                        class="btn btn-raised btn-danger btn-sm" href=" "> <i class="fas fa-trash" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
              <div class="card-body">
              </div>
          </div>
      </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header">Specialties</div>

                <div class="card-body">

                    <div class="specialtyForm">

                    <!-- Default form contact -->
                    <form class="text-center border border-light p-5" action="{{ route('admin.addSpecialty') }}" method="post">
                      {{ csrf_field() }}
                      <p class="h4 mb-4">Add specialty</p>
                      <!-- Name -->
                      <input type="text" id="defaultContactFormName" class="form-control mb-4" name='name' placeholder="Name">

                      <!-- Send button -->
                      <button class="btn btn-info btn-block" type="submit">Add</button>

                    </form>
                    <!-- Default form contact -->
                  </div>

                  <div class="allSpecialties">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($specialties as $specialty)
                        <tr>
                          <th scope="row">{{ $specialty->name}}</th>
                          <!-- Button trigger modal -->
                          <td>

                            <form id="delete-form-{{ $specialty->id}}" action="{{ route('admin.delete', $specialty->id)}}" method="post" style="display:none;">
                              {{ csrf_field() }}
                              {{ method_field('delete')}}
                            </form>
                            <button
                            onclick="if (confirm('Are you sure you want to delete this specialty?'))
                            {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $specialty->id}}').submit();
                            }else{
                              event.preventDefault();
                            } "
                            class="btn btn-raised btn-danger btn-sm" href=" "> <i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $specialties->links()}}
                  </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

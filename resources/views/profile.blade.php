@extends('template')

@section('mytitle', 'Profile')

@section('content')
        <div class="container-fluid">
            <h1>Edit Profile</h1>
            {{-- success --}}
            @if(session()->has('success'))
            <div id="alert" class="alert alert-success">
                {{session()->get('success')}}
            </div>
             @endif

             {{-- error --}}
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
             @endif
            <form method="POST" action="{{ route('profile/edit_validation') }}" > 
                @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Enter Name">
                  @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" value="{{ $data->email }}" name="email" placeholder="Enter Email">
                  @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="myInput" placeholder="Enter Password">
                  Show Password<input type="checkbox" class="mx-2" onclick="myFunction()">
                  @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_password" id="confirmpassword" placeholder="Enter Confirm Password">
                  Show Password<input type="checkbox" class="mx-2" onclick="confirmFunction()">

                  @if($errors->has('confirm_password'))
                        <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                  @endif
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
@endsection

<script>

    setTimeout(function() {
        $('#alert').fadeOut('slow');
    }, 5000);

    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }

    function confirmFunction(){
        var x = document.getElementById("confirmpassword");
        if (x.type === "password") {
        x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
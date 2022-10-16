@extends('template')

@section('mytitle', 'Add Sub User')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">
              <div class="row">Edit User</div>
            </h5>
            <div class="card-body">
                <form action="{{ route('sub_user.edit_validation') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Name">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">User Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $data->email }}" placeholder="Email">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">User Password</label>
                        <input type="password" class="form-control" id="showpass" name="password" placeholder="Password">
                        <input type="checkbox" class="mx-2" onclick="showpassword()" >Show Password
                        @if($errors->has('password'))
                        <br>
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" name="hidden_id" value="{{ $data->id }}">
                        <input type="submit" class="btn btn-primary"  value="Edit"/>
                    </div>
                     
                </form>
            </div>
          </div>
    </div>
@endsection

<script>
    function showpassword(){
        var x = document.getElementById('showpass');
        if(x.type === 'password'){
            x.type = "text";
        }else{
            x.type = "password";
        }
    }
</script>
@extends('auth.inner_layout')

@section('mytitle', 'Registration')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                <div class="col-lg-8 offset-2">
                    <div class="p-5">
                        
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">{{session()->get('error')}}</div>
                        @endif
                        <form class="user" action="{{ route('regitertation.custom') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name" placeholder="First Name">
                                @if($errors->has('name'))
                                <span class="text-danger">{{$errors->First('name')}}</span>
                            @endif
                            </div>
                           
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                           
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    @if($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                               
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="confirm_password" placeholder="Repeat Password">
                                    @if($errors->has('confirm_password'))
                                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                    @endif
                                </div>
                               
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block"> Register Account</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
    
   
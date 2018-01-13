@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
               <div class="card">
                   <div class="card-body">
                       <h3 class="card-title">Login Form</h3>
                       <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                          <!--  Email Address -->
                           <div class="form-group">
                               <label for="">Email Address</label>
                               <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                               @if ($errors->has('email'))
                                   <p class="form-text text-danger strong">
                                       {{ $errors->first('email') }}
                                   </p>
                               @endif
                           </div>
                        <!-- password -->
                       <div class="form-group">
                           <label for="">Password</label>
                           <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                           @if ($errors->has('password'))
                               <p class="form-text text-danger strong">
                                   {{ $errors->first('password') }}
                               </p>
                           @endif
                       </div>

                           <div class="form-group">
                               <label class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Remember Me</span>
                               </label>
                           </div>

                           <div class="form-group">
                               <button type="submit" class="btn btn-primary">
                                   Login
                               </button>
                               
                               <a class="btn btn-link" href="{{ route('password.request') }}">
                                   Forgot Your Password?
                               </a>
                           </div>
                       </form>
                   </div>
               </div>    

        </div>
    </div>
</div>
@endsection

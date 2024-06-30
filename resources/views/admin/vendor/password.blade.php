@extends('layouts.app')
@section('content')

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Update Password to Your Account</h5>
                    <p class="text-center small">Enter your Password & confirm password </p>
                    @include('message')
                  </div>

                  <form class="row g-3 needs-validation" action="" novalidate method="POST">
                    {{ csrf_field() }}
                    <div class="col-12">
                      <label class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input type="Password" name="Password" class="form-control" required>
                        <div style="color: red">{{$errors->first('password')}}</div>
                        <div class="invalid-feedback">Please enter your password.</div>

                      </div>
                    </div>

                    <div class="col-12">
                      <label  class="form-label"> Confirm Password</label>
                      <input type="password" name="password" class="form-control"  required>
                      <div style="color: red">{{$errors->first('password')}}</div>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Reset</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{url('register')}}">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>
@endsection

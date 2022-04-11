@extends('layouts.master')


@section ('title','تسجيل حساب')

@section('content') 

       
   
   <!--
        Header
    -->
@include('layouts.header')
  

    <!--Main Content-->
    <main class=" my-5 pt-5 ">
        <div id="main-wrapper" class="container">
          <div class="row justify-content-center card">
              <div class="">
                  <div class="card border-0 ">
                      <div class="card-body p-0">
                          <div class="row no-gutters">
                              <div class="col-lg-6">
                                  <div class="p-5">
                                      <div class="mb-3">
                                          <h3 class="h4 font-weight-bold text-theme">قم بتوظيف موهوب</h3>
                                      </div>
      
                                      <h6 class="h5 mb-0 mt-5">مرحباً بك   !</h6>
                                      <p class="text-muted mt-1 mb-3"> شكراً لتواجدك على منصتنا</p>
      
                                      <form action="{{ route('vacancy_create') }}" method="POST" enctype="multipart/form-data">
                                          @csrf

                                        <div class="row">
                                        <div class="form-group col-6 mb-3">
                                            <label for="exampleInputEmail1 " class="mb-2" >الاسم الاول</label>
                                            <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('firstName') }}">
                                            @error('firstName') <span id="exampleInputEmail1-error" class="error invalid-feedback ">{{ $message }}</span> @enderror
                                       
                                        </div>
                                        <div class="form-group col-6 mb-3">
                                            <label for="exampleInputEmail1 " class="mb-2" >اللقب</label>
                                            <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('lastName') }}">
                                            @error('lastName') <span id="exampleInputEmail1-error" class="error invalid-feedback ">{{ $message }}</span> @enderror
                                        </div>
                                      </div>
                                          <div class="form-group mb-3">
                                              <label for="exampleInputEmail1 " class="mb-2">الايميل الالكتروني</label>
                                              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('email') }}">
                                              @error('email') <span id="exampleInputEmail1-error" class="error invalid-feedback ">{{ $message }}</span> @enderror
                                          </div>
                                          
                                          <div class="form-group mb-3 ">
                                              <label for="exampleInputPassword1" class="mb-2">كلمة السر</label>
                                              <input type='password' name="password"  class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" >
                                              @error('password') <span id="exampleInputEmail1-error" class="error invalid-feedback ">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="form-group mb-5">
                                            <label for="exampleInputPassword1" class="mb-2"> تأكيد كلمة السر</label>
                                            <input type='password' name="confirm_password"  class="form-control @error('password') is-invalid @enderror" id="exampleInputRetypePassword" >
                                            @error('password') <span id="exampleInputEmail1-error" class="error invalid-feedback ">{{ $message }}</span> @enderror
                                        </div>
                                          <p> امتلك حساب ? <span><a href='login.html' >تسجيل الدخول</a></span></p>
                                          <button type="submit" class="btn btn-theme">تسجيل حساب</button>
                                      </form>
                                  </div>
                              </div>
      
                              <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block  rounded-right">
                                    <div class="overlay rounded-right" style="background-image: url('/assets/images/signin-login-vectors/company-concept-illustration_114360-2581.jpg');
                                    background-size: cover;"></div>
                                 
                                </div>
                              </div>
                          </div>
      
                      </div>
                      <!-- end card-body -->
                  </div>
                  <!-- end card -->
      
      
                  <!-- end row -->
      
              </div>
              <!-- end col -->
          </div>
          <!-- Row -->
      </div>
      </main>

          <!--
Footer section
-->
@include('layouts/footer')
@stop
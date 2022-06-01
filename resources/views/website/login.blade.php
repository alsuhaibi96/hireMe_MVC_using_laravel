@extends('layouts.master')


@section ('title','login')

@section('content') 

@include('layouts.header')
    <!--Main -->

    <main class="py-4 my-5 pt-5 mt-5">
        <div id="main-wrapper" class="container">
          <div class="row justify-content-center">
              <div class="">
                  <div class="card border-0 ">
                      <div class="card-body p-0">
                          <div class="row no-gutters">
                              <div class="col-lg-6">
                                  <div class="p-5">
                                      <div class="mb-5">
                                          <h3 class="h4 font-weight-bold text-theme">تسجيل الدخول</h3>
                                      </div>
      
                                      <div class=" mb-0">
                                          @if(session()->has('success'))

                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>نجاح!</strong>     {{ session()->get('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        
                                        
                                    @endif

                                    @if(session()->has('message'))

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>فشل!</strong>     {{ session()->get('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    
                                    
                                @endif
                                </div>
                                      <p class="text-muted mt-2 mb-5"> شكراً لتواجدك على منصتنا</p>
      
                                      <form autocomplete="off" action="{{ route('logging_in') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                              <label for="">الايميل الالكتروني</label>
                                              <input autocomplete="off" value ="" name="email" type="email" class="form-control @error('email')
                                              is-invalid
                
                                              @enderror" id="">
                                              @error('email')
                                                          <span class="error invalid-feedback">{{ $message }}</span>                                 
                                              @enderror
                                          </div>
                                          <div class="form-group mb-5">
                                              <label for="exampleInputPassword1">كلمة المرور</label>
                                            <span><a href='{{ route('ForgetPasswordGet') }}'>هل نسيت كلمة المرور ؟</a></span><br>

                             
                                              <input autocomplete="off" value="" name="password" type='password'  class="form-control @error('email')
                                              is-invalid
                
                                              @enderror" id="exampleInputPassword1">
                                              @error('password') <span id="exampleInputEmail1-error" class="error invalid-feedback ">{{ $message }}</span> @enderror
                                            </div>
                                          <p>لا امتلك حساب ? <span><a href='{{ route('registeration') }}'>تسجيل حساب</a></span></p>
                                     
                                          <button  type="submit" class="btn btn-theme ">الدخول</button>
                                      </form>
                                  </div>
                              </div>
      
                              <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block  rounded-right">
                                    <div class="overlay rounded-right" style=" background-image: url('/assets/images/signin-login-vectors/pc.svg');
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

@include('layouts.footer')
          <!--
Footer section
-->

@stop

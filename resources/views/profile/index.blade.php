@extends('layouts.profile_layouts.profile_master')
 <!-- Nav section -->
    <!-- start setting box -->
@section('content')



<!-- Start Dashboard Page  -->
<div class="container home-stats text-center">
    <h1 class="text-white">لوحة التحكم</h1>
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="stat st-experi">
               

                 <h4>الخبرات</h4>
                    <span><a href="">  <img src="assets/profile-images/businessman-working-on-laptop-experience-260nw-1612204909.jpg" alt="Experience" class="img-thumbnail img-fluid"></a></span>
                
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat st-skills">
             
               
                  <h4>المهارات</h4>
                    <span><a href="{{ route ('skills') }}"><img src="assets/profile-images/skills-concept-education-training-improvement-people-get-knowledge-build-career-illustration_277904-4760.jpg" alt="Skills" class="img-thumbnail img-fluid"></a></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat st-quali">
           
               
                   <h3>المؤهلات</h3>
                    <span><a href="dashboard-views/qualification.html"><img src="assets/profile-images/Qualifications.jpg" alt="Qualifications" class="img-fluid img-thumbnail"></a></span>
                
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat st-course">

                  <h3>الدورات التدريبية</h3>
                    <span><a href="dashboard-views/courses.html"><img src="assets/profile-images/How-short-online-courses-can-actually-help-in-career.jpg" alt="Courses" class="img-fluid img-thumbnail"></a></span>
             
            </div>
        </div>
    </div>
</div>

<div class="container latest">
    <div class="row">
        <div class="col-sm-5 m-auto">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-users"></i> المعلومات الشخصية
                    
                </div>
                <div class="card-body">
                    <ul class=" list-unstyled latest-users">
                        <label class="card-title" >الاسم</label>
                    <li  class="col-12 bg-light ">{{ $user->first_name . ' '. $user->last_name }}</li>

                    <div class="row ">
                        <div class="container col-12">
                        <label class="card-title" >الايميل</label>
                    <li class="bg-light">{{ $user->email }}</li>
                    </div>
                    
                    </div>
<div class="row ">
    <div class="container col-6">
    <label class="card-title" >العنوان</label>
@if(!isset($user->profile->address))
<li class="bg-light">العنوان</li>

@else
<li class="bg-light">{{ $user->profile->address }}</li>
@endif
</div>
<div class="col-6">
<label class="card-title" >رقم الهاتف</label>

<li  class="bg-light ">{{ (isset($user->phone_number )?$user->phone_number:'ادخل رقم الهاتف')}}</li>
</div>
</div>

<div class="row ">
    <div class="container col-6">
    <label class="card-title" >التعليم</label>
    @if(!isset($user->profile->education))
    <li class="bg-light">التعليم</li>
    
    @else
    <li class="bg-light">{{ $user->profile->education }}</li>
    @endif

</div>
<div class="col-6">
<label class="card-title" >المسمى الوظيفي</label>

@if(!isset($user->profile->job))
    <li class="bg-light">الوظيفة</li>
    
    @else
    <li class="bg-light">{{ $user->profile->job }}</li>
    @endif
</div>
</div>
{{-- <div class="col-6">
<label class="card-title" >سنوات الخبرة</label>

<li  class="bg-light ">{{ $user->profile->education }}</li>
</div> --}}

                    </ul>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#editModal">
                        <span class="btn btn-success col-12 py-2">
                            تعديل
                        </span>
                    </a>
                </div>
            </div>
        </div>
       
    </div>
   
</div>
<!-- End Dashboard Page -->

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">تعديل البروفايل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="skills.html" method="post">
                    <div class="mb-3 row">
                        <label for="Experience" class="col-sm-3 col-form-label">الاسم</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="skill" placeholder="ادخل اسمك"
                                >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="years" class="col-sm-3 col-form-label">الايميل</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" placeholder="ادخل الايميل"
                               value="alsuhaibiabdulrahman@gmail.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="company" class="col-sm-3 col-form-label">المهارات</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="level" placeholder="ادخل المهارات" 
                                value="مطور مواقع ويب">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button type="button" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop
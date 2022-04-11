@extends('layouts.admin_layouts.master');
 
  @section ('title','لوحة التحكم')

@section('content')

<!-- vacancies List Table -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addjob"> إضافة وظيفة </button>


<!-- vacancies Table -->
<div class="card mt-2">
  <h5 class="card-header">قائمة الوظائف</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>عنوان الوظيفة</th>
          <th>الوصف</th>
          <th>المتطبات</th>
          <th>الراتب</th>
          <th>الموقع</th>

          <th>تعديل / حذف</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      
        @foreach ($jobs as $job)
        <tr>
          <td><strong>{{ $job->title }}</strong></td>
          <td><p class="">{{ $job->description }}</p></td>
          <td><p>{{ $job->requirments }}</p></td>

          <td>{{ $job->payment }}</td>
          <td>{{ $job->location }}</td>

     
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-update"  data-bs-id="{{ $job->id }}" data-bs-fname="{{ $job->first_name  }}" data-bs-lname="{{ $job->last_name  }}"data-bs-uname="{{ $job->job_name  }}"  data-bs-pnumber="{{ $job->phone_number  }}"data-bs-email="{{ $job->email  }}"data-bs-active="{{ $job->is_active  }}"data-bs-roles="{{ $job->roles  }}">
     
      <i class="bx bx-edit-alt me-1"></i> تعديل</button>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
       
    
      </tbody>
    </table>
  </div>
</div>
<!-- / vacancies Table -->


@stop
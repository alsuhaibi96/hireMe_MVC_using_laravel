
@extends('layouts.admin_layouts.master');
 
@section ('title','عرض مستخدمين')

@section('content')

<!-- Users List Table -->


<div class="card"> 

  <h5 class="card-header">المستخدمين</h5> 
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>الاسم </th>
          <th>الايميل</th>
          <th>الحالة</th>
          <th>العمليات</th>
       
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

        <tr >  
          <td >  </td>
          <td >    </td>


         
          
         <td>
            
            <span class="badge bg-label-success me-1">مفعل</span>
             <span class="badge bg-label-danger me-1">موقف</span>
            </td>
          <td> 
            <a href="/edit_user" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> </a>
            <button type="button" class="btn btn-icon ">
                <i class="tf-icons bx bx-trash me-1 " style="color:red"></i>
              </button>

           
          </td>
        </tr>
      
      </tbody>
    </table>
  </div>
</div>
  
@stop
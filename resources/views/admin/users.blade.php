@extends('layouts.admin_layouts.master');
 
  @section ('title','أدارة المستخدمين')

@section('content')

<!-- Users List Table -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser"> إضافة مستخدم </button>


  <!-- Users Table -->
  <div class="card mt-2">
    <h5 class="card-header">قائمة المستخدمين</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>الاسم</th>
            <th>الايميل</th>
            <th>الصلاحيات</th>
            <th>الحالة</th>
            <th>تعديل / حذف</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $user)
          <tr>
            <td><strong>{{ $user->first_name .' '.$user->last_name }}</strong></td>
            <td>{{ $user->email }}</td>
            <td>
              <ul>
              @foreach ($user->getRoles() as $role)
              @if(count($user->getRoles())>1)
                  <span>{{ $role.' ,' }}</span>
                  @else
                  <span>{{ $role }}</span>
                  <!-- comment example for branch from commit-->
                @endif
              @endforeach
                
              
                
              </ul>
            </td>
            <td>
              @if($user->is_active==1)  
          
              <span class="badge bg-label-primary me-1">
                مفعل
              </span>
              @else
             
              <span class="badge bg-label-danger me-1">
                غير مفعل
              </span>
              @endif
              
            
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
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
  <!-- / Users Table -->





<!-- Add User Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-2 p-md-4 ">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>إضافة بيانات المستخدم</h3>
          
        </div>
        <form id="" class="row g-3" action="{{ route('save_user') }}" method="POST" enctype="multipart/form-data">
          @csrf
  
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserFirstName">الاسم الاول</label>
            <input type="text" id="modalEditUserFirstName" name="firstName" class="form-control" placeholder="عبدالرحمن" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserLastName">اللقب</label>
            <input type="text" id="modalEditUserLastName" name="lastName" class="form-control" placeholder="الصهيبي" />
          </div>
          <div class="col-12">
            <label class="form-label" for="modalEditUserName">اسم المستخدم</label>
            <input type="text" id="modalEditUserName" name="userName" class="form-control" placeholder="abdulrahman.96" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserEmail">الايميل</label>
            <input type="text" id="modalEditUserEmail" name="email" class="form-control" placeholder="example@domain.com" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserStatus">الحالة</label>
            <select id="modalEditUserStatus" name="isActive" class="form-select" aria-label="Default select example">
              <option selected>الحالة</option>
              <option value="1">مفعل</option>
              <option value="0">غير مفعل</option>
            </select>
          </div>
          
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserPhone">رقم الهاتف</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">+967</span>
              <input type="text" id="modalEditUserPhone" name="phoneNumber" class="form-control phone-number-mask" dir="ltr" placeholder="777 555 111" />
            </div>
          </div>
          
          <div class="col-md-6 mb-4">
            <div>
                <label for="select2Multiple" class="form-label @error('roles') is-invalid @enderror">Role</label>
                <select name="roles[]" id="select2Multiple" class="select2 form-select" multiple>
                    @if(isset($roles))
                        @foreach($roles as $role)
                            <option>{{ $role }}</option>
                        @endforeach
                    @endif
                </select>
                @error('roles') <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror
            </div>
        </div>
          
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">تأكيد</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">الغاء</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->



<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Edit User Information</h3>
          <p>Updating user details will receive a privacy audit.</p>
        </div>
        <form id="editUserForm" class="row g-3" onsubmit="return false">
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserFirstName">First Name</label>
            <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="John" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserLastName">Last Name</label>
            <input type="text" id="modalEditUserLastName" name="modalEditUserLastName" class="form-control" placeholder="Doe" />
          </div>
          <div class="col-12">
            <label class="form-label" for="modalEditUserName">Username</label>
            <input type="text" id="modalEditUserName" name="modalEditUserName" class="form-control" placeholder="john.doe.007" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserEmail">Email</label>
            <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" placeholder="example@domain.com" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserStatus">Status</label>
            <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select" aria-label="Default select example">
              <option selected>Status</option>
              <option value="1">Active</option>
              <option value="2">Inactive</option>
              <option value="3">Suspended</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditTaxID">Tax ID</label>
            <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserPhone">Phone Number</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">+1</span>
              <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="202 555 0111" />
            </div>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserLanguage">Language</label>
            <select id="modalEditUserLanguage" name="modalEditUserLanguage" class="select2 form-select" multiple>
              <option value="">Select</option>
              <option value="english" selected>English</option>
              <option value="spanish">Spanish</option>
              <option value="french">French</option>
              <option value="german">German</option>
              <option value="dutch">Dutch</option>
              <option value="hebrew">Hebrew</option>
              <option value="sanskrit">Sanskrit</option>
              <option value="hindi">Hindi</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Country</label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select" data-allow-clear="true">
              <option value="">Select</option>
              <option value="Australia">Australia</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Belarus">Belarus</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
            </select>
          </div>
          <div class="col-12">
            <label class="switch">
              <input type="checkbox" class="switch-input">
              <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
              </span>
              <span class="switch-label">Use as a billing address?</span>
            </label>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->

@stop
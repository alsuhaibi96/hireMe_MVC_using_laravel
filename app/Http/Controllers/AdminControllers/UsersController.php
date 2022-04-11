<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
use App\Models\AdminModels\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                return view('website/login');
    }
    /**
     * Display a listing of roles andd users.
     *
     * @return \Illuminate\Http\Response
     */
    public function rolesUsersShow()
    {
        $users = User::orderBy('id','DESC')->get();
        $roles = Role::pluck('name')->all();
        return view('admin.users', compact('users','roles'));
    }


    /**
     * Display register view
     * @return \Illuminate\Http\Response;
     */
    public function viewFreelancerRegister(){
        return view('website/freelancer_signup');
    }
    
    /**
     * Display register view
     * @return \Illuminate\Http\Response;
     */
    public function viewVacancyRegister(){
        return view('website/vacancy_signup');
    }
    
    /**
     * Display registeration view ( user or vacancy)
     * 
     */

   public function viewRegisteration(){
       return view('website/registeration');

   }

   /**
    *  Check for user radio input if 1 register as a freelancer if not register as a vacancy

    */
   public function viewRegisterationPage(Request $request){
    if(($request->radio1)==1)
    return  redirect()->route('freelancer_register');
    return  redirect()->route('vacancy_register');
    
    
   }


   /** create freelancer method
    * 
    */
    public function createFreelancer(Request $request){
      return  $this->addVacancyFreelancer($request,'Customer');
    }

 /** create freelancer method
    * 
    */
    public function createVacancy(Request $request){
        return  $this->addVacancyFreelancer($request,'Vacancy');
      }


        /** create freelancer or vacancy method
    * 
    */
    public function addVacancyFreelancer (Request $request , $roleName){
        Validator::validate($request->all(),[
            'firstName'=>['string','required','min:3','max:20',],
            'lastName'=>['string','required','min:3','max:20'],
            'email'=>['email','required','min:3','unique:users,email'],
            'password'=>['required','min:5','same:confirm_password'],
            


        ],[
            'lastName.required'=>'This field is required',
            'firstName.required'=>'This field is required',
            'password.min'=>'Can not be less than 3 letters', 
            'email.unique'=>'There is an email in the table',
            'confirm_password.same'=>'password do not match',

        ]);


        
        $user=new User();
        $user->first_name=$request->input('firstName');
        $user->last_name=$request->input('lastName');
        $user->email=$request->input('email');
        $user->password= Hash::make($request->password);
        
        if($user->save()){
            $user->attachRole($roleName);
        return redirect()->route('login')
        ->with(['success'=>' 
        قم بتسجيل الدخول !          
        ']);
        return back()->with(['error'=>'خطأ في التسجيل']);
        }
    }

    /**
     *  for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Validator::validate($request->all(),[
            'firstName'=>['string','required','min:3','max:20',],
            'lastName'=>['string','required','min:3','max:20'],
            'phoneNumber'=>['integer','required','min:3','max:9'],
            'userName'=>['string','required','min:3','max:20','unique:users,name'],
            'email'=>['email','required','min:3','unique:users,email'],
            'password'=>['required','min:5'],
            'confirm_password'=>['same:password'],
            'isActive'=>['required'],
            'roles'=>['required'],





        ],[
            'lastName.required'=>'This field is required',
            'firstName.required'=>'This field is required',
            'phoneNumber.required'=>'This field is required',
            'userName.required'=>'This field is required',
            'password.min'=>'Can not be less than 3 letters', 
            'email.unique'=>'There is an email in the table',
            'confirm_password.same'=>'password dont match',
            'isActive.required'=>'This field is required',
            'roles.required'=>'This field is required',

        ]);

        $user=new User();
        $user->first_name=$request->input('firstName');
        $user->last_name=$request->input('lastName');
        $user->user_name=$request->input('userName');
        $user->phone_number=$request->input('phoneNumber');
        $user->is_active=$request->input('isActive');
        $user->email=$request->input('email');
        $user->password= Hash::make($request->password);
        
        if($user->save())
        $user->attachRoles($request->input('roles'));
        // dd($user);
        return redirect()->route('users')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }


       /**
        * login to the system and redirect according to the role name
        */
       public function logIn(Request $request){
        
        Validator::validate($request->all(),[
            'email'=>['email','required','min:3','max:50'],
            'password'=>['required','min:5']


        ],[
            'email.required'=>'This field is required',
            'password.required'=>'This field is required', 
           
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

            
            if(Auth::user()->hasRole('Vacancy'))
            return redirect()->route('view_jobs');
            else 
            return redirect()->route('profile');

        
        }
        else {
            return redirect()->route('login')->with(['message'=>
'تأكد من إدخال بياناتك بشكل صحيح'  

        ]);
        }

        
       }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $request->validate([
             'firstName'=>'required',
             'lastName'=>'required',
             'phoneNumber'=>'required',
             'email'=>'required',
             'userName'=>'required',
             'isActive'=>'required',

        ]);
        $userId=$request->input('id');
        $firstName=$request->input('firstName');
        $last_name=$request->input('lastName');
        $user_name=$request->input('userName');
        $phone_number=$request->input('phoneNumber');
        $email=$request->input('email');
        $is_active=$request->input('isActive');
    


        // $userId->update($request->all());
        $affected = DB::table('users')
        ->where('id', $userId)->update(['first_name' =>$firstName,'last_name'=>$last_name,'user_name'=>$user_name,'phone_number'=>$phone_number,'email'=>$email,'is_active'=>$is_active ]);
        $userRoles=User::where('id',$userId)->get();
      
        $userRoles->attachRoles($request->input('roles'));

        // dd($request->input('roles'));
        return redirect()->route('users')
        ->with(['تم'=>'تم التعديل بنجاح']);
        return back()->with(['فشل'=>'لم يتم التعديل']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

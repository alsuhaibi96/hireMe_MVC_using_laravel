<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModels\Role;
use App\Models\AdminModels\User;



class SettingsController extends Controller
{
/**
 * function for generating rules
 * 
 */
function generateRoles(){
    Role::create([
        'name' => 'Super Admin',
        'display_name' => 'مالك الموقع', // optional
        'description' => 'مالك الموقع ', // optional
    ]);
    Role::create([
        'name' => 'Contnet Admin',
        'display_name' => 'مديرالمحتوى', // optional
        'description' => 'مدير محتوى الموقع', // optional
    ]);
    Role::create([
        'name' => 'Customer',
        'display_name' => 'مستخدم الموقع العادي', // optional
        
    ]);
    Role::create([
        'name' => 'Vacancy',
        'display_name' => 'الشركة المستفيدة من الموقع', // optional
        
    ]);
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

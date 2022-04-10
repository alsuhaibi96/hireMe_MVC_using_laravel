<?php

namespace App\Models\CustomerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CustomerProfile extends Model
{
    use HasFactory;

    /**
     * assign customer profile to many skills
     */
   public function skill(){
        return $this->hasMany(Skill::class,'customer_id');
        
    }
}

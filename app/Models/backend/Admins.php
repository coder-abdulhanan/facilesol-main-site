<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;
    protected $table = "admins";
    protected $primary_key = "id";
    public $timestamps = false;

    //Mutator
    public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucwords($value);
    }

    // public function setLastNameAttribute($value){
    //     $this->attributes['last_name'] = ucwords($value);
    // }

    public function getFirstNameAttribute($value){
        return ucwords($value);
    }

    public function getLastNameAttribute($value){
        return ucwords($value);
    }

    //strtolower
    //ucfirst
    //strrev
    //substr
    //trim

}

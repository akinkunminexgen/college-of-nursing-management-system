<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['email', 'dob', 'password', 'reg_no', 'metadata', 'phone'];

    public function cardapplicant()
    {
        return $this->hasOne('App\Models\Cardapplicant');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFormSetting extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'date_of_birth', 'gender'];

    public static function formInputs()
    {
        return [
            'name' => 'text',
            'phone_number' => 'tel',
            'date_of_birth' => 'date',
            'gender' => 'radio'
        ];
    }
}

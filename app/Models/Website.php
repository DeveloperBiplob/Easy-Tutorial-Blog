<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'logo',
        'phone',
        'email',
        'address',
        'facebook',
        'twitter',
        'behance',
        'linkdin',
        'footer',
    ];
}

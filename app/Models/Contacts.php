<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory, Loggable;
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}

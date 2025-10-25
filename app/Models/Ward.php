<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    protected $fillable = [
        'warn_code',
        'name',
        'Province_code',
    ];
}

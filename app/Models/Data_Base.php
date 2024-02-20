<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data_Base extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='Data_Base';
    protected $fillable = [
        'sql',
        'nosql'
    ];

}

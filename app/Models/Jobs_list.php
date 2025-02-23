<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs_list extends Model
{
    use HasFactory;
    
    protected $table = 'jobs_list';
    public $timestamps = false;
    protected $fillable = ['titulo', 'salario'];
}

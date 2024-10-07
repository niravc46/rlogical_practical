<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable=['batch_name','module1_start','module1_end','module2_start','module2_end','module3_start','module3_end','module4_start','module4_end'];
}

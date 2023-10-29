<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $table='days';
    protected $primaryKey='id';
    public $timestamps=true or false;
    protected $fillable = [
        'day_name',
    ];
}

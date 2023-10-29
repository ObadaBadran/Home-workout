<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $table="parts";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'name_of_part',

    ];
    public function exercise(){
        return $this->hasMany(Exercise::class,"exercise_id");
    }
}

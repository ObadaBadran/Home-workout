<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table="levels";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'level_name',
    ];
    public function users(){
        return $this->hasMany(User::class,"level_id");
    }
    public function exercise(){
        return $this->hasMany(Exercise::class,"exercise_id");
    }
}

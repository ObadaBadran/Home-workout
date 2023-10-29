<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    protected $table="goals";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'goal_name',
    ];
public function users(){
    return $this->hasMany(User::class,"goal_id");
}
    public function exercise(){
        return $this->hasMany(Exercise::class,"exercise_id");
    }
}

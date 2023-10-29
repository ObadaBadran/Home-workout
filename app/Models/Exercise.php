<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table="exercises";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'name',
        'counter',
        'duration',
        'description',
        'calories',
        'gif_url',
        'points',
        'goal_id',
        'level_id',

        'part_id'
    ];

    public function part(){
        return $this->belongsTo(Part::class,'part_id');
    }

    public function goal(){
        return $this->belongsTo(Goal::class,'goal_id');
    }
    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }}

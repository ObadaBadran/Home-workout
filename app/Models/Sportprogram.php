<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sportprogram extends Model
{
    use HasFactory;
    protected $table="sport_programs";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'begenning_date',
        'finishing_date',
        'periods',
        'times_in_week',
    ];
    public function users(){
        return $this->hasMany(User::class,"sportprogram_id");
    }
    public function exercises(){
        return $this->belongsToMany('app\Model\Exercise','exercise_sprograms','sportprogram_id','exercise_id');
    }
}

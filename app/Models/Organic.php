<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organic extends Model
{
    use HasFactory;
    protected $table='organics';
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'begenning_date',
        'finishing_date',
        'eating_times',
    ];
    public function users(){
        return $this->hasMany(User::class,"organic_id");
    }
    public function categories(){
        return $this->belongsToMany('App\Models\Category','diet_categories','organic_id','category_id');
    }
}

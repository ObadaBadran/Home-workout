<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'type_of_food',
        'calories',
        'description',
    ];
    public function organics(){
        return $this->belongsToMany('App\Models\Organic','diet_categories','category_id','organic_id');
    }
}

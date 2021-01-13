<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $with = ['category'];
    protected $guarded = [];

    protected $hidden = [
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    protected $keyType = 'string';
    public $incrementing = false;

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

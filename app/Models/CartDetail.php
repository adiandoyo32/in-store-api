<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cart_details';
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}

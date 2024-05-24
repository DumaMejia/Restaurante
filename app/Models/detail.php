<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;

    protected $fillable = ['food_id', 'order_id', 'cantidad', 'p_unitario', 'p_total',];

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id', 'id');
    }

    public function food()
    {
        return $this->belongsTo(food::class, 'food_id', 'id');
    }


}

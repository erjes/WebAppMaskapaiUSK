<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $primaryKey = "id_customer";

    protected $fillable = [
        'id_customer',
        'name',
        'email',
        'phone_number',
        'address',
        'id_user',
        'customer_status',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

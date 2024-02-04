<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table = "transaction";

    protected $primaryKey = "id_transaction";

    protected $fillable = [
        'id_transaction',
        'id_flight',
        'id_user',
        'no_booking',
        'total_price',
        'payment_status',
        'seat',
    ];
    public $timestamps = false;

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'id_flight');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

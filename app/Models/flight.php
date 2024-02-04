<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $table = "flight";
    protected $primaryKey = 'id_flight';

    protected $fillable = [
        'id_flight',
        'id_airline',
        'no_flight',
        'departure_city',
        'arrival_city',
        'departure_date',
        'departure_time',
        'arrival_date',
        'arrival_time',
        'seat_availability',
        'price',
        'id_user',
    ];
    public $timestamps = false;

    public function airline()
    {
        return $this->belongsTo(Airline::class, 'id_airline');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_flight');
    }
}

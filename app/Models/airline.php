<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class airline extends Model
{
    use HasFactory;
    protected $table = "airline";
    protected $primaryKey = "id_airline";

    protected $fillable = [
        'id_airline',
        'name',
    ];
    public $timestamps = false;

    public function flights()
    {
        return $this->hasMany(flight::class);
    }
}

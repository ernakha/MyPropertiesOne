<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = "kota";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama'];

    public function properti()
    {
        return $this->hasMany(Properti::class, 'kota_id');
    }
}

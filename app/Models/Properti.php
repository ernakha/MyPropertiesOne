<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;
    protected $table = "properti";
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'alamat', 'notelp', 'kota_id', 'harga', 'sertifikat_id', 'lb', 'lt', 'kt', 'km', 'garasi', 'deskripsi', 'gambar', 'slug'];

    public function kota(){
        return $this->belongsTo(Kota::class,'kota_id','id');
    }

    public function sertifikat(){
        return $this->belongsTo(Sertifikat::class,'sertifikat_id','id');
    }
}

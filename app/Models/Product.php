<?php

namespace App\Models;

use App\Models\pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = "product";
    protected $fillable =
    [
        'nama',
        'product',
        'price',
        'stock',
        'description'
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'nama');
    }
    public function priceFormatted()
    {
        return 'Rp .' .number_format($this->price);
    }
}

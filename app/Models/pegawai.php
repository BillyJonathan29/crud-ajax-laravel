<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    public $table = "pegawai";
    protected $fillable =
    [
        'nama',
        'email'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

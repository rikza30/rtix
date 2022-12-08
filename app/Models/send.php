<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send extends Model
{
    protected $fillable =[
        'Nama','KodePembayaran','Nominal'
    ];
}

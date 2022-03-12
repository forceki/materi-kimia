<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    
    protected $table = 'materi';

    protected $dates = ['tanggal'];

    protected $fillable = [
        'judul',
        'isi',
        'created_at',
        'tanggal',
        'guru',
        'path_image'
    ];
    public $timestamps = false;
}

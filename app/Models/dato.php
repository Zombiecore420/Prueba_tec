<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dato extends Model
{
    use SoftDeletes;

    protected $table = 'dato';
    protected $primaryKey = 'id_llanta';
    protected $fillable = ['nombre','ancho_llanta','diametro_rin', 'presion_max', 'fabricante','stock'];
    protected $dates = ['deleted_at'];
}

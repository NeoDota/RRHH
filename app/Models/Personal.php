<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personal extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function baja() : HasMany {
        return $this->hasMany(Baja::class);
    }
    public function atencion() : HasMany {
        return $this->hasMany(Atencion::class);
    }
    public function comision() : HasMany {
        return $this->hasMany(Comision::class);
    }
    public function designacion() : HasMany {
        return $this->hasMany(Designacion::class);
    }
    public function transferencia() : HasMany {
        return $this->hasMany(Transferencia::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    use HasFactory;

    //realcion uno a muchos
    /**
     * Get all of the categorias for the programas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programas()
    {
        return $this->hasOne('App\Models\programa', 'id', 'programa_id');
    }
}

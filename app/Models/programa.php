<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programa extends Model
{
    use HasFactory;

    /**
     * Get the libro that owns the estudiante
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estudiante()
    {
        return $this->BelongsTo('App\Models\estudiante');
    }
}

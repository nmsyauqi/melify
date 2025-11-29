<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Meli;

class MeliUri extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Relasi: Satu MeliUri (Induk) memiliki Banyak Meli (Anak)
     */
    public function melis(): HasMany
    {
        return $this->hasMany(Meli::class);
    }
}
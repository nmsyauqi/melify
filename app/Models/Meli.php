<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\MeliUri;

class Meli extends Model
{
    protected $fillable = [
        'meli_uri_id',
        'name',
        'formula',
        'color',
        'mohs_hardness',
    ];

    public function uri(): BelongsTo
    {
        return $this->belongsTo(MeliUri::class, 'meli_uri_id');
    }
}

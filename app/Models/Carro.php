<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carro extends Model
{
    protected $table = 'carros';

    protected $primaryKey = 'id';

    protected $fillable = ['nome', 'marca_id', 'modelo', 'ano'];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

}

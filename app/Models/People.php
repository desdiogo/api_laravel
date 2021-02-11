<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';

    protected $primaryKey = 'id';

    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'isCNPJ', 'cnpj', 'cpf'];

}

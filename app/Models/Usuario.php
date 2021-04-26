<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  protected $table = "usuario";
  protected $primaryKey = "id";
  protected $guarded = [
    'nome', 'email', 'senha', 'updated_at', 'created_at'
  ];
}

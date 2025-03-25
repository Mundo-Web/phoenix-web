<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $filiable = [
        'order',
        'titulo',
        'descripcion',
        'imagen',
        'status'];
}

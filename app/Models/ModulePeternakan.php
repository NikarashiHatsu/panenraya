<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulePeternakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'label_module', 'jenis_module'
    ];
}

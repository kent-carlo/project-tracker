<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status',
        'as_built_plan_submitted',
        'date_approved',
        'npc',
        'notes',
    ];
}

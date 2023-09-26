<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        // Has many products
        return $this->hasMany(User::class);
    }
}
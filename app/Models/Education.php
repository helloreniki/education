<?php

namespace App\Models;

use App\Models\User;
use App\Models\Organiser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function organiser()
    {
        return $this->belongsTo(Organiser::class);
    }
}

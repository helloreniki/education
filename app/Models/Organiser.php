<?php

namespace App\Models;

use App\Models\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organiser extends Model
{
    use HasFactory;

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}

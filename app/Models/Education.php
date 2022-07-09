<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Organiser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'city', 'organiser_id', 'price', 'credits'];

    protected $dates = ['date'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function organiser()
    {
        return $this->belongsTo(Organiser::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when($filters['upcoming'] ?? false, fn($query) =>
            $query->where('date', '>', now())
        );

        $query->when($filters['past'] ?? false, fn($query) =>
            $query->where('date', '<=', now())
        );

        $query->when($filters['upcoming'] ?? false, fn($query) =>
            $query->where('date', '>', now())
        );

    }
}

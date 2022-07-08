<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Education;
use App\Models\Department;
use App\Models\Profession;
use App\Models\WorkPosition;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function work_position()
    {
        return $this->belongsTo(WorkPosition::class);
    }

    public function educations()
    {
        return $this->belongsToMany(Education::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

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


    protected $dates = [
        'deleted_at'
    ];

    protected $expires = '1 year';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    protected static function boot()
    {
        parent::boot();

        if (!app()->runningInConsole()) {
            static::created(function ($user) {
                $user->createPersonnel();
            });
        }
    }

    public function createPersonnel()
    {
        $fullName = $this->name;
        $nameParts = explode(' ', $fullName, 2); // Split into first name and last name

        $personnel = new Personnel();
        $personnel->first_name = $nameParts[0] ?? ''; // First name
        $personnel->last_name = $nameParts[1] ?? ''; // Last name
        $personnel->ranks = 'Patrolman';
        $personnel->unit = 'PRO3';
        $personnel->sub_unit = 'Pampanga PPO';
        $personnel->station = 'Apalit Municipal Police Station';
        $personnel->status = 'Active';

        // Save the personnel record and associate it with the user
        $this->personnel()->save($personnel);
    }

    public function personnel(): HasOne
    {
        return $this->hasOne(Personnel::class);
    }

}

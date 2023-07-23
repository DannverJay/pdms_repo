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
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'expires_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $dates = ['deleted_at', 'expires_at'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->createPersonnel();
        });

        static::deleting(function ($user) {
            $user->expires_at = Carbon::now()->addYear();
            $user->save();
        });
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

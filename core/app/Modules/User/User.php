<?php

namespace App\Modules\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\BaseApp\Traits\HasAttach;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements LaratrustUser
{
    use HasRolesAndPermissions;
    use HasApiTokens, HasFactory, Notifiable;
    use HasAttach;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture'
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
    protected static array $attachFields = [
        'profile_picture' => [
            'sizes' => ['small' => 'crop,400x300', 'large' => 'resize,800x600'],
            'modulePath' => 'users/profiles',
            'path' => 'uploads'
        ],
    ];
    public function setPasswordAttribute($value)
    {
        if (trim($value)) {
            $this->attributes['password'] = bcrypt(trim($value));
        }
    }
}

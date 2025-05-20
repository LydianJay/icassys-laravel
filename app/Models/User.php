<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'email_verified_at',
        'img',
        'fname',
        'mname',
        'lname',
        'gender',
        'dob',
        'contactno',
        'address',
        'is_active',
        'e_contact',
        'e_contact_no',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function staff()
    {
        return $this->hasOne(Staff::class, 'user_id');
    }
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'user_id', 'id');
    }
    public function student()
    {
        return $this->hasOne(student::class, 'user_id', 'id');
    }
}

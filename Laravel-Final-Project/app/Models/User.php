<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  // table : users 
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;
    // laravel sanctum , roles , api tokens  
    // hasRoles('Admin') :  if user admin or not 
    // hasFactory :  for database seeder (generate sample data)
    // notifiable : for notifications 
    // hasApiTokens : for generate token (login) 


    public function tasks(): HasMany // 1 user --> many tasks (hasMany) 
    {
        return $this->hasMany(Task::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [ // columns that can be filled 
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [ // columns that should not be shown (for security)
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string> // type of columns
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // convert email_verified_at to date and time
            'password' => 'hashed', // convert password to hashed password
        ];
    }
}

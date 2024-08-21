<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, HasRoles;

    protected $guarded = ['id'];
    protected $table = 'users';

    // Implementing the JWTSubject methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->getRoleNames(),
        ];

        return $data;
    }
}

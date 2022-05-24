<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['acc', 'password'];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    // public function getAuthPassword()
    // {
    //     return $this->pw;
    // }
}
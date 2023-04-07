<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';
    public const TABLE = 'users';

    public const ID = 'id';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';


    protected $guarded = [
        self::ID,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETED_AT,

    ];

    protected $hidden = [
        self::PASSWORD,

    ];

    /*
     * RELATIONS
     */
    public function recipe(): HasMany
    {
        return $this->hasMany(Recipe::class, Recipe::AUTHOR_ID, self::ID);
    }
    public function useraccesstoken(): HasMany
    {
        return $this->hasMany(UserAccessToken::class, UserAccessToken::USER_ID, self::ID);
    }
}
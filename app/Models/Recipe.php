<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'recipes';
    public const TABLE = 'recipes';

    public const ID = 'id';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETE_AT = 'delete_at';
    public const TITLE = 'title';
    public const AUTHOR = 'author';
    public const INGREDIENTS = 'ingredients';
    public const INSTRUCTIONS = 'instructions';

    protected $guarded = [
        self::ID,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETE_AT,
    ];

    //Relations
    public function user(): HasOne
    {
        return $this->hasOne(User::class, User::NAME, self::AUTHOR);
    }



}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class ScrapedRecipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'scraped_recipes';
    public const TABLE = 'scraped_recipes';
    public const ID = 'id';
    public const URL_ID = 'url_id';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETE_AT = 'delete_at';
    public const TITLE = 'title';
    public const INGREDIENTS = 'ingredients';
    public const INSTRUCTIONS = 'instructions';

    protected $guarded = [
        self::ID,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETE_AT,
    ];
    protected $casts = [
        self::INGREDIENTS => 'array',
        self::INSTRUCTIONS => 'array',
    ];
    //Relations
    public function webScrapedUrl(): BelongsTo
    {
        return $this->belongsTo(WebScrapedUrl::class, self::URL_ID, WebScrapedUrl::ID);
    }



}
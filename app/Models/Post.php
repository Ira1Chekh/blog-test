<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'status',
        'publish_date'
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'status' => PostStatusEnum::class,
    ];
}

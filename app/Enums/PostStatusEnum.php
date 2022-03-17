<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self draft()
 * @method static self published()
 */
final class PostStatusEnum extends Enum
{
    const DRAFT = 'draft';
    const PUBLISHED = 'published';
}

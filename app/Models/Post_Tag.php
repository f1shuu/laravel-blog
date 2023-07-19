<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Post_Tag
 *
 * @method static Builder|Post_Tag newModelQuery()
 * @method static Builder|Post_Tag newQuery()
 * @method static Builder|Post_Tag query()
 */
class Post_Tag extends Pivot
{
    use HasFactory;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property string $image
 * @property string $slug
 * @property string $meta_description
 * @property string $meta_keywords
 * @property mixed $status
 * @property string $created_at
 * @property string $updated_at
 */
class Page extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['author_id', 'title', 'excerpt', 'body', 'image', 'slug', 'meta_description', 'meta_keywords', 'status', 'created_at', 'updated_at'];

}

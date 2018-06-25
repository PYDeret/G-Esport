<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class Message extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'message', 'created_at', 'updated_at'];

}

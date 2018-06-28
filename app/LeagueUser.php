<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $user
 * @property string $created_at
 * @property string $updated_at
 */
class LeagueUser extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'user', 'created_at', 'updated_at'];

}

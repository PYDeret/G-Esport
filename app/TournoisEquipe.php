<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $TournoiId
 * @property int $EquipeId
 * @property string $created_at
 * @property string $updated_at
 */
class TournoisEquipe extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['TournoiId', 'EquipeId', 'created_at', 'updated_at'];

}

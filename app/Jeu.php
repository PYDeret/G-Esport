<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $libelle
 * @property string $description
 * @property string $slug
 * @property int $TypeJeuId
 * @property string $created_at
 * @property string $updated_at
 */
class Jeu extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['libelle', 'description', 'slug', 'TypeJeuId', 'created_at', 'updated_at'];

}

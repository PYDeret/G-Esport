<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $libelle
 * @property string $description
 * @property string $image
 * @property string $DateDebut
 * @property string $DateFin
 * @property string $HeureDebut
 * @property string $HeureFin
 * @property string $slug
 * @property int $ResultatId
 * @property string $created_at
 * @property string $updated_at
 * @property int $EquipeId
 */
class Tournoi extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['libelle', 'description', 'image', 'DateDebut', 'DateFin', 'HeureDebut', 'HeureFin', 'slug', 'ResultatId', 'created_at', 'updated_at', 'EquipeId'];


}
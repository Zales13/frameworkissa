<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * Recupere les utilisateurs possedant cette competences.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('level');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Matiere extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function filieres(): BelongsToMany
    {
        return $this->belongsToMany(Filiere::class);
    }

    public function instructeurs(): BelongsToMany
    {
        return $this->belongsToMany(Instructeur::class);
    }
}

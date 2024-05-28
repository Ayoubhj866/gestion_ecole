<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instructeur extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function matieres(): BelongsToMany
    {
        return $this->belongsToMany(Matiere::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function matiere(): BelongsToMany
    {
        return $this->belongsToMany(Matiere::class);
    }
}

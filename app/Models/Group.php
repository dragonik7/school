<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model {

	use HasFactory;
    protected $fillable = ['name'];

    public function students(): HasMany {
        return $this->hasMany(Student::class, 'group_id', 'id');
    }
    public function lectures(): BelongsToMany{
        return $this->belongsToMany(Lecture::class, 'schedules', 'group_id', 'lecture_id');
    }
}

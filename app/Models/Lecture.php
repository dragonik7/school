<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lecture extends Model {

	use HasFactory;
    protected $fillable = ['name', 'description'];

    public function students(): BelongsToMany {
        return $this->belongsToMany(Student::class, 'visits', 'lecture_id', 'student_id');
    }
    public function groups(): BelongsToMany {
        return $this->belongsToMany(Group::class, 'schedules', 'lecture_id', 'group_id');
    }
}

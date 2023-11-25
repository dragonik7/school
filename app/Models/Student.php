<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model {

    use HasFactory;

    protected $fillable = ['name', 'email', 'group_id'];

    public function group(): BelongsTo {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function lectures() {
        return $this->belongsToMany(Lecture::class, 'visits', 'student_id', 'lecture_id');
    }
}

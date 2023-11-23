<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model {

	use HasFactory;

    public function students() {
        $this->belongsToMany(Student::class, 'visits', 'schedule_id', 'student_id');
    }

    public function lecture(): BelongsTo {
        return $this->belongsTo(Lecture::class, 'lecture_id', 'id');
    }

    public function group(): BelongsTo {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}

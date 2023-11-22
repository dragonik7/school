<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Students extends Model {

    use HasFactory;

    protected $fillable = ['name', 'email', 'group_id'];
    protected $with = ['group'];

    public function group(): BelongsTo {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}

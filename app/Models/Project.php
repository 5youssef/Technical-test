<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'manager_id',
        'status_id',
        'title',
        'deadline',
        'description',
    ];


    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getDeadlineAttribute($deadline)
    {
        return Carbon::parse($deadline);
    }
}

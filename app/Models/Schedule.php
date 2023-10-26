<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['day_id', 'doctor_id'];
    public function days()
    {
        return $this->belongsTo(WeekDays::class, 'day_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'en_name',
        'ar_name',
        'status',
        'en_desc',
        'ar_desc'
    ];
    public function doctor(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'en_name', 'ar_name', 'price', 'en_desc', 'ar_desc', 'status'
    ];
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class);
    }
}

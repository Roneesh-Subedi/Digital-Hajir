<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
    ];

    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public function calenders()
    {
        return $this->hasMany(Calender::class);
    }
}

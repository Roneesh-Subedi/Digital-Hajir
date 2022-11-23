<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subgroup extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Member::class, 'subgroup_id');
    }

    protected static function booted()
    {
        static::creating(function ($group) {
            $group->slug = self::generateUniqueSlug($group->name);
        });
    }
    private static function generateUniqueSlug($group): string
    {
        $slug = Str::slug($group);
        $count = Subgroup::whereRaw("slug RLIKE '^{$slug}(-[0-9]*)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}

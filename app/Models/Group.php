<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    public function subgroups(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subgroup::class);
    }

    protected static function booted()
    {
        static::creating(function ($group) {
            $group->slug = self::generateUniqueSlug($group->name);
            $group->company_id = $group->company_id??auth()->user()->company_id;
        });
    }
//    generate unique slug
    private static function generateUniqueSlug($group): string
    {
        $slug = Str::slug($group);
        $count = Group::whereRaw("slug RLIKE '^{$slug}(-[0-9]*)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}

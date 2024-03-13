<?php

namespace App\Models;

use App\Models\traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, HasUuid;

    protected $keyType = 'int';

    public $incrementing = false;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getImageAttribute($value)
    {
        return asset('storage/articles/' . $value);
    }
}

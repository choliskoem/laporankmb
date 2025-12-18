<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;
protected $table = 'persons'; 
    protected $fillable = [
        'name',
        'type'
    ];

    /**
     * Relasi ke content_roles
     */
    public function roles()
    {
        return $this->hasMany(ContentRole::class);
    }

    /**
     * Relasi ke contents via pivot content_roles
     */
    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_roles')
                    ->withPivot('role')
                    ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_media';

    protected $fillable = ['nama_medsos'];

    public function contents()
    {
        return $this->hasMany(Content::class, 'medsos_id');
    }
}

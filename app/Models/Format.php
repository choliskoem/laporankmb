<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Format extends Model
{
    use HasFactory;

    protected $fillable = ['nama_format'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}

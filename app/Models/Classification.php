<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = ['nama_klasifikasi'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentRole extends Model
{
    use HasFactory;

    protected $table = 'content_roles';

    protected $fillable = [
        'content_id',
        'person_id',
        'role'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}

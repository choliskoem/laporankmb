<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'judul',
        'program_id',
        'klasifikasi_id',
        'medsos_id',
        'format_id',
        'link'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Classification::class, 'klasifikasi_id');
    }

    public function medsos()
    {
        return $this->belongsTo(SocialMedia::class, 'medsos_id');
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    // Relasi pivot: content_roles
    public function roles()
    {
        return $this->hasMany(ContentRole::class);
    }

    // Relasi many-to-many ke persons
    public function persons()
    {
        return $this->belongsToMany(Person::class, 'content_roles')
            ->withPivot('role')
            ->withTimestamps();
    }

    // dapatkan banyak nama berdasarkan role
    public function getPersonNames($role)
    {
        return $this->persons
            ->where('pivot.role', $role)
            ->pluck('name')
            ->join(', ');
    }

    public function getPersonName($role)
{
    $names = $this->persons
        ->where('pivot.role', $role)
        ->pluck('name');

    return $names->isEmpty() ? '-' : $names->join(', ');
}
}

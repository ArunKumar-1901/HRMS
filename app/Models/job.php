<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'requirements', 'status'];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    
}

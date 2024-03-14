<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = "leaves";
    protected $fillable = ['start_date', 'end_date', 'reason', 'status'];
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}

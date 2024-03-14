<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Employeemodel extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    use HasFactory;
    protected $table = "employee";
    protected $fillable = [
        "empid",
        "name",
        "email",
        "role",
        "username",
        "password",
        "confirmpassword",
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}

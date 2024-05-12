<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bloggerUser extends Model
{
    use HasFactory;
    protected $table = "blogger_users";
    protected $fillable = [
        "name",
        "surname",
        "email",
        "password"
    ];
}

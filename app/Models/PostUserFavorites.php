<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserFavorites extends Model
{
    use HasFactory;

    protected $table = 'post_user_favorites';
    protected $guarded = false;
}

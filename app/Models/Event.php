<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    //un usuario puede apuntarse a muchos eventos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

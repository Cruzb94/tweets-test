<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'message'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijazah extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sign()
    {
        return $this->hasOne(Sign::class);
    }
}

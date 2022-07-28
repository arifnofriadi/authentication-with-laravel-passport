<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = [ 'image', 'name', 'group_id', 'address', 'phone_number', 'email' ];

    public function getGroupName() {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publish_date',
        'notice_date',
        'message',
        'created_by',
    ];

    public function role(){
        return $this->belongsTo(Role::class,'message_to','id');
    }
}

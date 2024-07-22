<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'body',
        'deadLine',
        'user_id',
        'time',
        'class',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}

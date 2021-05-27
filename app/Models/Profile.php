<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email','username', 'city', 'address', 'gender', 'profile_pic', 'is_admin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profilePicture()
    {
        $imagePath = ($this->profile_pic) ? '/storage/'.$this->profile_pic : 'https://picsum.photos/id/43/200/300';
        return $imagePath;
    }
}

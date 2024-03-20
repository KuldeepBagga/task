<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetails extends Model
{
    use HasFactory;
    protected $table='user_details';
    protected $fillable=[
         'address', 
         'city', 
         'state', 
         'date_of_birth'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}

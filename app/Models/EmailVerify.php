<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerify extends Model
{
    use HasFactory;
    protected $username = 'email_verify'; // Thay 'your_column_name' b

    protected $fillable = [
        'id',
        'userId',
        'email',
        'email_verified_at',
        'verify_email_token',
        'token_try'
    ];

}

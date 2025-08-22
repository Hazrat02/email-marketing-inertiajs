<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
      protected $fillable = [
        'user_id', 'total_mail', 'total_cost', 'try', 'to_email', 'template',
        'from_email', 'name', 'logo','sub', 'body'
    ];
}

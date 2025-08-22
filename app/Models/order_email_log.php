<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_email_log extends Model
{
    use HasFactory;

      protected $fillable = [
        'order_id', 'user_id', 'email', 'status', 'response'];
}

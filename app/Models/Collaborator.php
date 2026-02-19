<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'birth_date',
        'email',
        'phone_number',
        'address',
    ];
}


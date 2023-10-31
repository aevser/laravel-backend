<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModal extends Model
{
    use HasFactory;

    protected $table = 'form_modal';

    protected $fillable = ['name', 'phone'];
}

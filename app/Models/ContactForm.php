<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $table = 'contact_form';
    protected $primaryKey = 'formId';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'message',
    ];

    public function getContactName() : string {
        /* Returns the full name of the contactee */
        return "{$this->first_name} {$this->last_name}";
    }
}

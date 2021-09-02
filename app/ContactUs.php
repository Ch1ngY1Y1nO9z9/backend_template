<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [
        'companyName',
        'companyWebsite',
        'country',
        'business',
        'firstName',
        'lastName',
        'email',
        'phone',
        'fax',
        'address',
        'content'
    ];

    protected $table = 'contact_us';
}

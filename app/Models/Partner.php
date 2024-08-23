<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    public $table = 'partners';
    protected $fillable = [
    	'partner_id',
    	'user_id',
    	'company_name',
    	'website_url',
    	'office_contact',
    	'address_line1',
    	'address_line2',
    	'landmark',
    	'city',
    	'state',
    	'country',
    	'proof_of_id',
    	'proof_of_address',
    	'gst_number',
    	'bank_name',
    	'account_holder_name',
    	'account_number',
    	'ifsc_code',
    	'profile_complete'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}

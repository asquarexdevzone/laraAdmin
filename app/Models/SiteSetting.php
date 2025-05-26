<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'company_name', 'mobile_no', 'email_id',
        'website', 'facebook', 'twitter',
        'linkedin', 'pinterest', 'whatsapp'
    ];
}

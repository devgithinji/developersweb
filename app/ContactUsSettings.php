<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsSettings extends Model
{
    protected $fillable = ['phoneone','phonetwo','phonethree','emailone','emailtwo','emailthree','facebookLink','twitterLink','linkedInLink','address'];
}

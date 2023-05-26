<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table      = 'settings';

    protected $allowedFields = ['id', 'logo_url', 'favIcon_url', 'companyName', 'instagramUrl', 'twitterUrl', 'facebookUrl', 'location', 'phone', 'mail', 'hakkimizda', 'haftaIci', 'haftaSonu'];
}
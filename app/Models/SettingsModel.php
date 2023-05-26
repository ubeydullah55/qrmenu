<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table      = 'settings';

    protected $allowedFields = ['id', 'logo_url', 'companyName', 'instagramUrl', 'tiwtterUrl', 'facebookUrl', 'location', 'phone', 'mail', 'hakkimizda', 'haftaIci', 'haftaSonu'];
}
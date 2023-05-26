<?php

function settingsGet()
{
    $modelsettings = new \App\Models\SettingsModel;
    $data['settings'] = $modelsettings->first();
    $data['settings'] = array(
        'id' => $data['settings']['id'],
        'logo_url' => $data['settings']['logo_url'],
        'companyName' => $data['settings']['companyName'],
        'instagramUrl' => $data['settings']['instagramUrl'],
        'twitterUrl' => $data['settings']['twitterUrl'],
        'facebookUrl' => $data['settings']['facebookUrl'],
        'location' => $data['settings']['location'],
        'phone' => $data['settings']['phone'],
        'mail' => $data['settings']['mail'],
        'hakkimizda' => $data['settings']['hakkimizda'],
        'haftaIci' => $data['settings']['haftaIci'],
        'haftaSonu' => $data['settings']['haftaSonu'],
    );
    return ($data);
}
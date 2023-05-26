<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Anasayfa extends Controller
{
  public function index()
  {
    $modelcategories = new \App\Models\UserModel;
    $modelproducts = new \App\Models\ProductsModel;
    $modelSettings = new \App\Models\SettingsModel;
    $data['category'] = $modelcategories->findAll();
    $data['settings'] = $modelSettings->findAll();
    $data['products'] = $modelproducts->where('is_active', 1)->findAll();
    helper('settings');
    $data['settings'] = settingsGet()['settings'];
    return view('menu', $data);
  }
  public function call($table_no)
  {
    $modelcall = new \App\Models\CallWaiterModel;
    //qrcode ile girilmemişse table_no=null şartı koyup yönlendirme yapılacak
    /*
    if ($table_no == 9999) {
      $session = session();
      session()->setFlashdata('danger', '-HATA-Garson çarğırmak için qr cod ile giriş yapmalısınız...');
      return redirect()->to(base_url('/?id=' . $table_no));
    }
    */
    $rule = array(
      'table_no' => $table_no,
      'time' => date('H:i')
    );

    $callInsert = $modelcall->insert($rule);
    if (isset($callInsert)) {
      $session = session();
      session()->setFlashdata('info', '-BAŞARILI-Garson çağırma talebiniz alınmıştır....');
      return redirect()->to(base_url('/?id=' . $table_no));
    } else {
      $session = session();
      session()->setFlashdata('danger', '-HATA-Garson çağırma talebiniz alınmadı....');
      return redirect()->to(base_url('/?id=' . $table_no));
    }
  }
}
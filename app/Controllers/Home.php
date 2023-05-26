<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->guvenlik();
    }
    public function guvenlik()
    {
        $session = session();
        if (empty($session->get('ad'))) {
            echo view('login');
            $session = session();
            session()->setFlashdata('danger', 'Lütfen telefon numarasını ve şifrenizi girerek giriş yapmayı deneyiniz.....');
            die();
        }
    }

    public function index()
    {
    }


    public function panel()
    {
        $modelcategories = new \App\Models\UserModel;
        $modelproducts = new \App\Models\ProductsModel;
        $modelEmploye = new \App\Models\KullaniciModel;
        $data['category'] = $modelcategories->findAll();
        $data['product'] = $modelproducts->findAll();
        $data['employe'] = $modelEmploye->findAll();
        $data['categoryCount'] = count($data['category']);
        $data['productCount'] = count($data['product']);
        $data['employeCount'] =  count($data['employe']);
        return view('backend/panel', $data);
    }

    public function category()
    {
        $modelcategories = new \App\Models\UserModel;
        $data['category'] = $modelcategories->findAll();
        return view('backend/category', $data);
    }

    public function category_insert()
    {

        $modelcategories = new \App\Models\UserModel;
        $categoryName = $this->request->getPost('category');
        $categoryRule = array(
            'name' => $categoryName
        );
        if (!empty($categoryName)) {
            $categortyInsert = $modelcategories->insert($categoryRule);
            if (!empty($categortyInsert)) {
                $session = session();
                session()->setFlashdata('info', 'Kategori başarılı bir şekilde eklendi');
                return redirect()->to('panel/category');
            } else {
                $session = session();
                session()->setFlashdata('danger', '-HATA-Kategori eklenirken bir hata oluştu....');
                return redirect()->to('panel/category');
            }
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA-Lütfen kategori ismi giriniz...');
            return redirect()->to('panel/category');
        }
    }
    public function categoryDelete($id)
    {

        $modelcategories = new \App\Models\UserModel;
        $modelproducts = new \App\Models\ProductsModel;
        $categorydeleted = $modelcategories->delete($id);
        $data['deleteProductsList'] = $modelproducts->where('categories_id', $id)->findAll();

        foreach ($data['deleteProductsList'] as $row) {
            $path = './img/product/' . $row['img'];
            unlink($path);
            $productsdeleted = $modelproducts->delete($row['id']);
        }

        $session = session();
        session()->setFlashdata('info', 'Kategori silme başarılı');
        return redirect()->to('panel/category');
    }
    public function categoryEditView($id)
    {
        $modelcategories = new \App\Models\UserModel;
        $data = $modelcategories->where('id', $id)->first();
        $data['categoryName'] = $data['name'];
        $data['categoryId'] = $id;

        return view('backend/categoryEditView', $data);
    }
    public function categoryEdit($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $modelcategories = new \App\Models\UserModel;
        $categoryName = $this->request->getPost('category');
        $categoryUpdate = $modelcategories->where('id', $id)->set('name', $categoryName)->update();
        if ($categoryUpdate) {
            $session = session();
            session()->setFlashdata('info', '-BAŞARILI-Kategori ekleme işlemi yapılmıştır');
            return redirect()->to('panel/category');
        }
    }

    public function urun()
    {
        $modelproducts = new \App\Models\ProductsModel;
        $data['productsActive'] = $modelproducts->where('is_Active', 1)->findAll();
        $data['productsPassive'] = $modelproducts->where('is_Active', 0)->findAll();
        return view('backend/urun', $data);
    }

    public function productsInfo($id, $info)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $data['product'] = $modelproducts->find($id);
        if ($info == 1) {
            $productPassive = $modelproducts->where('id', $id)->set('is_active', 0)->update();
            if ($productPassive) {
                $session = session();
                session()->setFlashdata('info', '-BAŞARILI-Ürün Pasif hale getirildi...');
                return redirect()->to('panel/product');
            }
        }
        if ($info == 0) {
            $productActive = $modelproducts->where('id', $id)->set('is_active', 1)->update();
            if ($productActive) {
                $session = session();
                session()->setFlashdata('info', '-BAŞARILI-Ürün Aktif hale getirildi...');
                return redirect()->to('panel/product');
            }
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
            return redirect()->to('panel/product');
        }
    }

    public function productsDelete($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $data['product'] = $modelproducts->find($id);
        if (!empty($data['product'])) {
            $path = './img/product/' . $data['product']['img'];
            unlink($path);
            $productDelete = $modelproducts->where('id', $id)->delete();
            if ($productDelete) {
                $session = session();
                session()->setFlashdata('info', '-BAŞARILI-Ürün veritabanından silindi...');
                return redirect()->to('panel/product');
            }
        }
        $session = session();
        session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
        return redirect()->to('panel/product');
    }

    public function productsEditView($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $modelcategories = new \App\Models\UserModel;
        $data['category'] = $modelcategories->findAll();
        $data['product'] = $modelproducts->find($id);
        $data['productCategory'] = $modelcategories->find($data['product']['categories_id']);
        if ($data['product']) {

            return view('backend/productEditView', $data);
        }

        $session = session();
        session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
        return redirect()->to('panel/product');
    }

    public function productEdit($id)
    {
        $modelproducts = new \App\Models\ProductsModel;
        $kategoriadi = $this->request->getPost('category');
        $data['product'] = $modelproducts->find($id);
        $data['productName'] = $this->request->getPost('product_name');
        $data['productInfo'] = $this->request->getPost('product_info');
        $data['product_img'] = $this->request->getPost('product_img');
        $data['productPrice'] = $this->request->getPost('product_price');
        $img = $this->request->getFile('product_img');
        $data['categoryid'] = explode("-", $kategoriadi);
        $data['categoryid'] = $data['categoryid'][0];


        if (empty($data['productName'])) {
            $session = session();
            session()->setFlashdata('danger', 'Ürün ismi boş bırakılamaz');
            return redirect()->to('panel/product');
        }
        if (empty($data['categoryid'])) {
            $session = session();
            session()->setFlashdata('danger', 'Kategori seçimi boş bırakılamaz');
            return redirect()->to('panel/product');
        }
        if (!empty($data['productName']) && !empty($data['categoryid'])) {
            if ($img->isValid()) {
                $path = './img/product/' . $data['product']['img'];
                unlink($path);
                $imgName = $img->getRandomName();
                $img->move('img/product/', $imgName);
                $insertGroup = array(
                    'categories_id' => $data['categoryid'],
                    'img' => $imgName,
                    'name' => $data['productName'],
                    'info' => $data['productInfo'],
                    'price' => $data['productPrice'],
                    'is_active' => 1
                );
                $editProducts = $modelproducts->where('id', $id)->set($insertGroup)->update();
                if ($editProducts) {
                    $session = session();
                    session()->setFlashdata('info', 'Ürün güncelleme başarılı');
                    return redirect()->to('panel/product');
                } else {
                    $session = session();    //ürün resmi seçilmiş güncelleme yapılmamış
                    session()->setFlashdata('danger', 'Ürün güncellenirken bir hata oldu....');
                    return redirect()->to('panel/product');
                }
            } else {
                //img is valid yani rsim değişimi yoksa
                $insertGroup = array(
                    'categories_id' => $data['categoryid'],
                    'img' => $data['product']['img'],
                    'name' => $data['productName'],
                    'info' => $data['productInfo'],
                    'price' => $data['productPrice'],
                    'is_active' => 1
                );
                $editProducts = $modelproducts->where('id', $id)->set($insertGroup)->update();
                if ($editProducts) {
                    $session = session();
                    session()->setFlashdata('info', 'Ürün güncelleme başarılı');
                    return redirect()->to('panel/product');
                }
            }
        }
        if (empty($data['productName']) || empty($data['categoryid'])) {
            $session = session();
            session()->setFlashdata('danger', 'Ürün adı yada category seçimi yapılmadı...');
            return redirect()->to('panel/product');
        }
        $session = session();
        session()->setFlashdata('info', 'Ürün güncellenirken bir hata oluştu');
        return redirect()->to('panel/product');
    }

    public function insertProduct()
    {
        $modelproducts = new \App\Models\ProductsModel;
        $kategoriadi = $this->request->getPost('category');
        $data['productName'] = $this->request->getPost('product_name');
        $data['productInfo'] = $this->request->getPost('product_info');
        $data['product_img'] = $this->request->getPost('product_img');
        $data['productPrice'] = $this->request->getPost('product_price');
        $img = $this->request->getFile('product_img');
        $data['categoryid'] = explode("-", $kategoriadi);
        $data['categoryid'] = $data['categoryid'][0];
        $nameControl = $modelproducts->where('name', $data['productName'])->find();

        if (empty($data['productName'])) {
            $session = session();
            session()->setFlashdata('danger', 'Ürün ismi boş bırakılamaz');
            return redirect()->to('panel/productInsertView');
        }
        if (empty($data['categoryid'])) {
            $session = session();
            session()->setFlashdata('danger', 'Kategori seçimi boş bırakılamaz');
            return redirect()->to('panel/productInsertView');
        }
        if (!empty($nameControl)) {
            $session = session();
            session()->setFlashdata('danger', 'Bu isimde bir ürün zaten mevcuttur');
            return redirect()->to('panel/productInsertView'); //Ayı isimli ürün varsa
        }


        if (!empty($data['productName']) && !empty($data['categoryid']) && empty($nameControl)) {
            if ($img->isValid()) {
                $imgName = $img->getRandomName();
                $img->move('img/product/', $imgName);
                $insertGroup = array(
                    'categories_id' => $data['categoryid'],
                    'img' => $imgName,
                    'name' => $data['productName'],
                    'info' => $data['productInfo'],
                    'price' => $data['productPrice'],
                    'is_active' => 1
                );
                $insertProducts = $modelproducts->insert($insertGroup);
                if ($insertProducts) {
                    $session = session();
                    session()->setFlashdata('info', 'Ürün ekleme başarılı');
                    return redirect()->to('panel/product');
                }
            } else {
                $session = session();
                session()->setFlashdata('danger', 'Ürün resmi seçilmedi');
                return redirect()->to('panel/productInsertView');
            }
        }
        if (!empty($nameControl)) {
            $session = session();
            session()->setFlashdata('danger', 'Bu isimde bir ürün zaten mevcut...');
            return redirect()->to('panel/productInsertView');
        }
        if (empty($data['productName']) && empty($data['categoryid'])) {
            $session = session();
            session()->setFlashdata('danger', 'Ürün adı ve Kategori boş bırakılamaz...');
            return redirect()->to('panel/productInsertView');
        }
        $session = session();
        session()->setFlashdata('danger', 'Ürün eklerken bir hata oluştu');
        return redirect()->to('panel/productInsertView');
    }



    public function call_view()
    {
        $modelcall = new \App\Models\CallWaiterModel;
        $call = $modelcall->findAll();
        $data['veriler'] = $call;
        return view('backend/callView', $data);
    }

    public function callDelete($id)
    {
        $modelcall = new \App\Models\CallWaiterModel;
        $callDelete = $modelcall->delete($id);
        if (isset($callDelete)) {
            $session = session();
            session()->setFlashdata('info', '-BAŞARILI-Veri silinmiştir....');
            return redirect()->to('panel/callView');
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA-Silme işlemi gerçekleştirilemedi....');
            return redirect()->to('panel/callView');
        }
    }

    public function employeInsert()
    {
        $modelKullanici = new \App\Models\KullaniciModel;

        $employeName = $this->request->getPost('employeName');
        $employeSurName = $this->request->getPost('employeSurName');
        $employeNumber = $this->request->getPost('employeNumber');
        $employePassword = $this->request->getPost('employePassword');
        $unvan = $this->request->getPost('unvan');
        $unvanNo = 2;
        if ($unvan == "GARSON") {
            $unvanNo = 2;
        }
        if ($unvan == "YETKİLİ") {
            $unvanNo = 1;
        }
        if ($unvan == "MÜDÜR") {
            $unvanNo = 0;
        }
        $data = array(
            'k_adi' => $employeNumber,
            'k_sifre' => $employePassword,
            'ad' => $employeName,
            'soyad' => $employeSurName,
            'unvan' => $unvan,
            'yetki' => $unvanNo
        );

        $employeInsert = $modelKullanici->insert($data);
        if (!empty($employeInsert)) {
            $session = session();
            session()->setFlashdata('info', 'Personel başarılı bir şekilde eklendi');
            return redirect()->to('panel/employeAddView');
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA-Personel eklenirken bir hata oluştu....');
            return redirect()->to('panel/employeAddView');
        }
    }

    public function employeDelete($id)
    {
        $modelKullanici = new \App\Models\KullaniciModel;
        $data['employe'] = $modelKullanici->find($id);
        $employeDelete = $modelKullanici->where('id', $id)->delete();
        if (!empty($employeDelete)) {
            $session = session();
            session()->setFlashdata('info', '-BAŞARILI-Personel veritabanından silindi...');
            return redirect()->to('panel/employeAddView');;
        } else {
            $session = session();
            session()->setFlashdata('danger', '-HATA- Bir hata oluştu');
            return redirect()->to('panel/employeAddView');
        }
    }

    public function settingsInsert()
    {
        $img = $this->request->getFile('logo_img');
        if ($img->isValid()) {
            $imgName = $img->getRandomName();
            $img->move('img/settings/', $imgName);
        }
        $companyName = $this->request->getPost('CompanyName');
        $instagramUrl = $this->request->getPost('instagramUrl');
        $twitterUrl = $this->request->getPost('twitterUrl');
        $facebookUrl = $this->request->getPost('facebookUrl');
        $location = $this->request->getPost('location');
        $phone = $this->request->getPost('phone');
        $mail = $this->request->getPost('mail');
        $hakkimizda = $this->request->getPost('hakkimizda');
        $haftaIci = $this->request->getPost('haftaIci');
        $haftaSonu = $this->request->getPost('haftaSonu');
    }

    public function quit()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}
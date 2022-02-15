<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\FileUploader;
use app\Core\Session;
use app\Core\View;
use app\DBModel\Pengguna;
use app\DTO\Banner\BannerRequest;
use app\DTO\Pengguna\AddPenggunaRequest;
use app\DTO\Pengguna\LoginPenggunaRequest;
use app\DTO\Pengguna\PenggunaRequest;
use app\Exception\ValidationException;
use app\Repository\BannerRepository;
use app\Repository\PenggunaRepository;
use app\Service\BannerService;
use app\Service\PenggunaService;
use SebastianBergmann\CodeUnit\InvalidCodeUnitException;

class BannerController
{
    private BannerService $service;
    private Session $session;
    private BannerRepository $repo;
    public function __construct()
    {
        $this->repo = new BannerRepository(Database::getConnection());
        $this->service = new BannerService($this->repo);
        $this->session = new Session();
    }

    public function index(){
//        echo '<pre>' , var_dump($this->service->GetAllModel()) , '</pre>';
//        return;
        View::RenderDashboard("Banner/index", [
            'title' => 'Banner',
            'page_type' => 'banner',
            'hak_akses' => $this->session->Get("hak_akses"),
            'data' => $this->service->GetAllModel()
        ]);
    }

    public function AddBanner()
    {
//        echo '<pre>' , var_dump($_POST) , '</pre>';
//        echo '<pre>' , var_dump($_FILES) , '</pre>';

        $fieldName = "banner";
        $img = FileUploader::HandleImageUpload($fieldName);
        $request = new BannerRequest();
        if(!$img->isSuccess)
        {
            View::Redirect("/dashboard-banner");
        }
        $request->url_banner = $img->filePath;
        $request->id_pengguna = $this->session->Get("id_pengguna");
        $this->service->AddBanner($request);
        View::Redirect("/dashboard-banner");
    }

    public function DeactivateBanner()
    {
                echo '<pre>' , var_dump($_POST) , '</pre>';
        //        echo '<pre>' , var_dump($_FILES) , '</pre>';
        $id = $_POST['id_banner'];
        $this->service->Deactivate($id);
        View::Redirect("/dashboard-banner");
    }

}
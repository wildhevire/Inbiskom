<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\FileUploader;
use app\Core\Session;
use app\Core\View;
use app\DTO\Konfigurasi\KonfigurasiRequest;
use app\Repository\KonfigurasiRepository;
use app\Service\KonfigurasiService;

class KonfigurasiController
{
    private KonfigurasiService $service;
    private Session $session;
    private KonfigurasiRepository $repo;
    public function __construct()
    {
        $this->repo = new KonfigurasiRepository(Database::getConnection());
        $this->service = new KonfigurasiService($this->repo);
        $this->session = new Session();
    }
    public function index(){
//        echo '<pre>' , var_dump($this->service->GetAllModel()) , '</pre>';
        View::RenderDashboard("Konfigurasi/index", [
            'title' => 'Konfigurasi',
            'page_type' => 'konfigurasi',
            'konfigurasi'=> $this->service->GetAllModel()
        ]);
    }

    public function AddKonfigurasi()
    {
        echo '<pre>' , var_dump($_POST) , '</pre>';
        echo '<pre>' , var_dump($_FILES) , '</pre>';

        $request = new KonfigurasiRequest();

        $request->nip= $_POST['nip'];
        $request->nama_ketua = $_POST['nama_ketua'] ;
        $request->alamat_inibiskom= $_POST['alamat'] ;
        $request->no_hp= $_POST['no_hp'] ;
        $request->no_wa= $_POST['no_wa'] ;
        $request->email= $_POST['email'] ;
        $request->username_ig= $_POST['username_ig'] ;
        $request->id_pengguna= $this->session->Get("id_pengguna");
        $img = FileUploader::HandleImageUpload('logo');
        if($img->isSuccess)
        {
            $request->url_logo = $img->filePath;
            $this->service->AddKonfigurasi($request);
            View::Redirect("/dashboard-konfigurasi");
        }

    }
}
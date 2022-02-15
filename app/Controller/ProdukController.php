<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\FileUploader;
use app\Core\Session;
use app\Core\View;
use app\DBModel\Foto;
use app\DTO\Foto\FotoRequest;
use app\DTO\Produk\ProdukRequest;
use app\Repository\FotoRepository;
use app\Repository\KelompokRepository;
use app\Repository\ProdukRepository;
use app\Service\FotoService;
use app\Service\KelompokService;
use app\Service\ProdukService;

class ProdukController
{
    private ProdukRepository $produkRepository;
    private ProdukService $produkService;
    private Session $session;

    private KelompokRepository $kelompokRepository;
    private KelompokService $kelompokService;

    private FotoRepository $fotoRepository;
    private FotoService $fotoService;
    public function __construct()
    {
        $this->produkRepository = new ProdukRepository(Database::getConnection());
        $this->produkService = new ProdukService($this->produkRepository);
        $this->kelompokRepository = new KelompokRepository(Database::getConnection());
        $this->fotoRepository = new FotoRepository(Database::getConnection());
        $this->fotoService = new FotoService($this->fotoRepository);
        $this->kelompokService = new KelompokService($this->kelompokRepository);
        $this->session = new Session();
    }
    public function index(){
        View::RenderDashboard("Produk/index", [
            'title' => 'Produk',
            'page_type' => 'produk',
            'hak_akses' => $this->session->Get("hak_akses"),
            'produk' => $this->produkService->GetAllModel(),
            'kelompok' => $this->kelompokService->GetAllModel()
        ]);

//        echo '<pre>' , var_dump($this->produkService->GetAllModel()) , '</pre>';
    }

//    public function AddProduk()
//    {
//        echo '<pre>' , var_dump($_FILES) , '</pre>';
//        echo '<pre>' , var_dump($_POST) , '</pre>';
//
//
//    }

    public function IsFileEntered($fieldName) : bool
    {
        if ($_FILES[$fieldName]['size'] == 0) {
            return false;
        }
        return true;
    }

    public function UpdateFoto($fieldName)
    {

    }


    public function UpdateProduk()
    {
//        echo '<pre>' , var_dump($_FILES) , '</pre>';
//        echo '<pre>' , var_dump($_POST) , '</pre>';
//        echo '<pre>' , var_dump(empty($_POST['id_foto_4'])) , '</pre>';
//        return;
//


        $req = new ProdukRequest();
        $req->id_produk = $_POST['id_produk'];
        $req->nama_produk = $_POST['nama_produk'];
        $req->harga = $_POST['harga'];
        $req->deskripsi_produk = $_POST['deskripsi_produk'];
        $req->id_kelompok = $_POST['id_kelompok'];

        $this->produkService->UpdateProduk($req);

        //Update FOto
        for ($i = 1; $i <= 5; $i++)
        {
            $fieldName = "foto-ubah-produk-1-".$i;
            $id = $_POST['id_foto_'.$i];
            if(!$this->IsFileEntered($fieldName) )
            {
                continue;
            }

            $isPrimary = false;
            if($i == 1) $isPrimary = true;

            $img = FileUploader::HandleImageUpload($fieldName);
            $request = new Foto();
            $request->id_foto = $id;
            $request->url = $img->filePath;
            $request->is_primary = $isPrimary;
            $request->id_produk = $req->id_produk;
            if(empty($id))
            {
                $fotoReq = new FotoRequest();
                $fotoReq->id_produk = $req->id_produk;
                $fotoReq->url = $request->url;
                $fotoReq->is_primary = $request->is_primary;
                $this->fotoService->AddFoto($fotoReq);
            }
            else
            {
                $this->fotoService->Update($request);

            }
        }

        View::Redirect("/dashboard-detail-kelompok?q=".$req->id_kelompok);
//        echo '<pre>' , var_dump($_POST) , '</pre>';
    }

    public function DeleteProduk()
    {

    //    echo '<pre>' , var_dump($_POST) , '</pre>';
        $id = $_POST['id_produk'];
        $this->produkService->DeleteProdukById($id);
        View::Redirect("/dashboard-detail-kelompok?q=".$_POST['id_kelompok']);
    }

    public function AddProduk()
    {
        //$produkCount = $_POST['produk_count'];
        $fotoCount = 5;
        //$fotoCount = $_POST['foto_count'];
        //echo '<pre>' , var_dump($_FILES) , '</pre>';
        //TODO : 1 kelompok produknya bisa banyak, insert produk dulu baru foto

        //Handle Produk
        $namaProduk     = $_POST['nama_produk'];
        $hargaProduk    = $_POST['harga'];
        $deskripsi      = $_POST['deskripsi_produk'];
        $kelompokID      = $_POST['id_kelompok'];
        $request = new ProdukRequest();
        $request->id_kelompok = $kelompokID;
        $request->nama_produk = $namaProduk;
        $request->harga = $hargaProduk;
        $request->deskripsi_produk = $deskripsi;
        $produk = $this->produkService->AddProduk($request);

        //Handle Foto
        for ($j = 1; $j <= $fotoCount; $j++)
        {
            if ($_FILES['foto-produk-1-'.$j]['size'] == 0)
            {
                continue;
            }

            $img = FileUploader::HandleImageUpload('foto-produk-1-'.$j);
//                if($img == null)
//                {
//                    throw new UploadFailedException("Gagal Upload File");
//                }

//                    if(!$img->isSuccess){
//                        //TODO : Throw Exception
//                        throw new UploadFailedException("Gagal Upload File Foto Produk");
//                    }
            $fotoReq = new FotoRequest();
            $fotoReq->id_produk = $produk->id_produk;
            $fotoReq->url = $img->filePath;
            $fotoReq->is_primary = 0;
            if($j == 1){
                $fotoReq->is_primary = 1;
            }
            $this->fotoService->AddFoto($fotoReq);
        }

        View::Redirect("/dashboard-detail-kelompok?q=".$kelompokID);

    }
}
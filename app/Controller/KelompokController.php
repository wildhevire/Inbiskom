<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\FileUploader;
use app\Core\Session;
use app\Core\View;
use app\DBModel\Foto;
use app\DTO\DetailKelompok\DetailKelompokRequest;
use app\DTO\Foto\FotoRequest;
use app\DTO\Kelompok\KelompokRequest;
use app\DTO\Produk\ProdukRequest;
use app\Exception;
use app\Exception\UploadFailedException;
use app\Repository\DetailKelompokRepository;
use app\Repository\FotoRepository;
use app\Repository\KategoriRepository;
use app\Repository\KelompokRepository;
use app\Repository\ProdukRepository;
use app\Service\DetailKelompokService;
use app\Service\FotoService;
use app\Service\KategoriService;
use app\Service\KelompokService;
use app\Service\ProdukService;

use app\Repository\KatalogRepository;
use app\Service\KatalogService;

class KelompokController
{
    private Session $session;

    private KatalogRepository $katalogRepository;
    private KatalogService $katalogService;

    private KelompokRepository $kelompokRepository;
    private KelompokService $kelompokService;
    private DetailKelompokRepository $detailKelompokRepository;
    private DetailKelompokService $detailKelompokService;
    private KategoriService $kategoriService;
    private KategoriRepository $kategoriRepository;
    private FotoRepository $fotoRepository;
    private FotoService $fotoService;
    private ProdukRepository $produkRepository;
    private ProdukService $produkService;


    public function __construct()
    {
        $this->session = new Session();

        $this->katalogRepository = new KatalogRepository(Database::getConnection());
        $this->katalogService = new KatalogService($this->katalogRepository);
        $this->kelompokRepository = new KelompokRepository(Database::getConnection());
        $this->fotoRepository = new FotoRepository(Database::getConnection());
        $this->kategoriRepository = new KategoriRepository(Database::getConnection());
        $this->detailKelompokRepository = new DetailKelompokRepository(Database::getConnection());
        $this->produkRepository = new ProdukRepository(Database::getConnection());

        $this->kelompokService = new KelompokService($this->kelompokRepository);
        $this->kategoriService = new KategoriService($this->kategoriRepository);
        $this->fotoService = new FotoService($this->fotoRepository);
        $this->detailKelompokService = new DetailKelompokService($this->detailKelompokRepository);
        $this->produkService = new ProdukService($this->produkRepository);
    }


    public function index(): void
    {
        View::RenderDashboard("Kelompok/index", [
            'title' => 'Kelompok',
            'page_type' => 'kelompok',
            'hak_akses' => $this->session->Get("hak_akses"),
            'data' => [
                'kategori' => $this->kategoriService->GetAllModel(),
                'produk' => $this->produkService->GetAllModel(),
                'kelompok' => $this->kelompokService->GetAllModel()
            ]
        ]);
    }

    public function detail(): void
    {
        $request = $_GET['q'];
        $produkByKelompok = $this->produkService->GetByKelompok($request);
        $memberModel = $this->katalogService->GetTokoDescriptionMember($request);
        $fotoModel = $this->fotoService->GetFotoForKelompok($request);
        //  echo '<pre>' , var_dump($memberModel) , '</pre>';
        View::RenderDashboard("DetailKelompok/index", [
            'title' => 'Kelompok',
            'page_type' => 'kelompok',
            'hak_akses' => $this->session->Get("hak_akses"),
            'data' => [
                'produk' => $produkByKelompok,
                'kategori' => $this->kategoriService->GetAllModel(),
                'kelompok' => $this->kelompokService->GetById($request),
                'penjual' => $memberModel,
                'foto' => $fotoModel
            ]
        ]);
    }

    private function OnActionSuccess(string $message, $model)
    {
        View::RenderDashboard('Kelompok/index', [
            'title' => 'Kelompok',
            'page_type' => 'kelompok',
            'hak_akses' => $this->session->Get("hak_akses"),
            'success' => $message,
            'data' => $model,
        ]);
    }

    private function OnActionError(string $message, $model)
    {
        View::RenderDashboard("Kelompok/index", [
            'title' => 'Kelompok',
            'page_type' => 'kelompok',
            'hak_akses' => $this->session->Get("hak_akses"),
            'error' => $message,
            'data' => $model
        ]);
    }
    public function UpdateKelompok()
    {
        //        echo '<pre>' , var_dump($_POST) , '</pre>';
        //        echo '<pre>' , var_dump($_FILES) , '</pre>';
        //        return;



        //


        $req = new KelompokRequest();
        $req->id_kelompok = $_POST["id_kelompok"];
        $req->nama_kelompok = $_POST["nama_kelompok"];
        $req->angkatan = $_POST["angkatan"];
        $req->tipe_kelompok = $_POST["tipe_kelompok"];
        $req->id_kategori = $_POST["id_kategori"];
        $req->deskripsi_kelompok = $_POST['deskripsi_kelompok'];

        $req->id_pengguna = $this->session->Get("id_pengguna");

        $fieldName = "url_logo_toko";

        if ($_FILES[$fieldName]['size'] == 0) {
            $req->url_logo_toko = "";
        } else {
            $img = FileUploader::HandleImageUpload('url_logo_toko');
            $req->url_logo_toko = $img->filePath;
        }


        try {



            $this->kelompokService->UpdateKelompok($req);
            View::Redirect('/dashboard-kelompok');
        } catch (\Exception $e) {

            $this->OnActionError(
                $e->getMessage(),
                [
                    'kategori' => $this->kategoriService->GetAllModel(),
                    'kelompok' => $this->kelompokService->GetAllModel()
                ]
            );
        }
    }
    public function DeleteKelompok()
    {
        //        echo '<pre>' , var_dump($_POST) , '</pre>';
        //        echo '<pre>' , var_dump($_FILES) , '</pre>';
        $id = $_POST["id_kelompok"];

        try {

            $this->kelompokService->DeleteKelompokById($id);
            View::Redirect('/dashboard-kelompok');
        } catch (\Exception $e) {
            $this->OnActionError(
                $e->getMessage(),
                [
                    'kategori' => $this->kategoriService->GetAllModel(),
                    'kelompok' => $this->kelompokService->GetAllModel()
                ]
            );
        }
    }

    public function TambahKelompok(): void
    {
        //        echo '<pre>' , var_dump($_POST) , '</pre>';
        //        echo '<pre>' , var_dump($_FILES) , '</pre>';

        try {
            $kelompok = $this->InsertKelompok();
            $this->InsertAllDetailKelompok($kelompok);
            $this->InsertAllProduk($kelompok);
            //            echo '<pre>' , var_dump($_POST) , '</pre>';
            //            echo '<pre>' , var_dump($_FILES) , '</pre>';
            $this->OnActionSuccess(
                "Berhasil Menambahkan Kelompok!",
                [
                    'kategori' => $this->kategoriService->GetAllModel(),
                    'kelompok' => $this->kelompokService->GetAllModel()
                ]
            );
        } catch (\Exception $exception) {

            $this->OnActionError(
                $exception->getMessage(),
                [
                    'kategori' => $this->kategoriService->GetAllModel(),
                    'kelompok' => $this->kelompokService->GetAllModel()
                ]
            );
        }
    }

    //return new insered kelompok id
    private function InsertKelompok(): string
    {
        $tipe =         $_POST['tipe_kelompok'];
        $nama =         $_POST['nama_kelompok'];
        $angkatan =     $_POST['angkatan'];
        $deskripsi =    $_POST['deskripsi_kelompok'];
        $id_kategori =  $_POST['id_kategori'];


        $img = FileUploader::HandleImageUpload('url_logo_toko');
        if (!$img->isSuccess) {
            //TODO : Throw Exception Gagal Upload
            throw new UploadFailedException("Gagal Upload File");
        }
        //TODO : Insert and Select Last Kelompok
        $request = new KelompokRequest();
        $request->nama_kelompok = $nama;
        $request->angkatan = $angkatan;
        $request->deskripsi_kelompok = $deskripsi;
        $request->tipe_kelompok = $tipe;
        $request->id_kategori = $id_kategori;
        $request->url_logo_toko = $img->filePath;
        $request->id_pengguna = $this->session->Get("id_pengguna");
        $result = $this->kelompokService->AddKelompok($request);
        $request->id_kelompok = $result->id_kelompok;
        return $request->id_kelompok;
    }

    private function InsertAllDetailKelompok(string $kelompokID)
    {
        $detailKelompokCount = $_POST['detail_kelompok_count'];
        for ($i = 1; $i <= $detailKelompokCount; $i++) {
            $noIdentitas        = $_POST['no_identitas-' . $i];
            $namaPenjual        = $_POST['nama_penjual-' . $i];
            $this->InsertSingleDetailKelompok($noIdentitas, $namaPenjual, $kelompokID);
        }
    }

    private function InsertSingleDetailKelompok(string $noId, string $nama, string $id_kelompok)
    {
        $request = new DetailKelompokRequest();
        $request->no_identitas = $noId;
        $request->nama_penjual = $nama;
        $request->id_kelompok = $id_kelompok;
        $this->detailKelompokService->AddPenjual($request);
    }

    private function InsertSingleProduk(string $onPostId, string $kelompokID)
    {
        $namaProduk         = $_POST['nama_produk-'       . $onPostId];
        $hargaProduk        = $_POST['harga-'             . $onPostId];
        $deskripsiProduk    = $_POST['deskripsi_produk-'  . $onPostId];
        $request = new ProdukRequest();
        $request->id_kelompok = $kelompokID;
        $request->nama_produk = $namaProduk;
        $request->deskripsi_produk = $deskripsiProduk;
        $request->harga = $hargaProduk;
        $this->produkService->AddProduk($request);
        return "";
    }

    private function InsertAllProduk(string $kelompokID)
    {
        $produkCount = $_POST['produk_count'];
        $fotoCount = 5;
        //$fotoCount = $_POST['foto_count'];

        //TODO : 1 kelompok produknya bisa banyak, insert produk dulu baru foto
        for ($i = 1; $i <= (int)$produkCount; $i++) {

            //Handle Produk
            $namaProduk     = $_POST['nama_produk-' . $i];
            $hargaProduk    = $_POST['harga-' . $i];
            $deskripsi      = $_POST['deskripsi_produk-' . $i];
            $request = new ProdukRequest();
            $request->id_kelompok = $kelompokID;
            $request->nama_produk = $namaProduk;
            $request->harga = $hargaProduk;
            $request->deskripsi_produk = $deskripsi;
            $produk = $this->produkService->AddProduk($request);

            //Handle Foto
            for ($j = 1; $j <= $fotoCount; $j++) {
                if ($_FILES['foto-produk-' . $i . "-" . $j]['size'] == 0) {
                    continue;
                }

                $img = FileUploader::HandleImageUpload('foto-produk-' . $i . "-" . $j);
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
                if ($j == 1) {
                    $fotoReq->is_primary = 1;
                }
                $this->fotoService->AddFoto($fotoReq);
            }
        }
    }
}

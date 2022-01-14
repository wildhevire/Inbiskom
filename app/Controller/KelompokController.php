<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\FileUploader;
use app\Core\Session;
use app\Core\View;
use app\Exception;
use app\Exception\UploadFailedException;
use app\Repository\KategoriRepository;
use app\Repository\KelompokRepository;
use app\Service\KategoriService;

class KelompokController
{
    private Session $session;

    private KelompokRepository $kelompokRepository;
    //private KelompokSer
    private KategoriService $kategoriService;
    private KategoriRepository $kategoriRepository;

    public function __construct()
    {
        $this->session = new Session();
        $this->kategoriRepository = new KategoriRepository(Database::getConnection());
        $this->kategoriService = new KategoriService($this->kategoriRepository);
    }


    public function index() : void{
        View::RenderDashboard("Kelompok/index", [
            'title' => 'Kelompok',
            'page_type' => 'kelompok',
            'data' => [
                'kategori' => $this->kategoriService->GetAllModel(),
            ]
        ]);
    }

    public function TambahKelompok() : void
    {
        echo '<pre>' , var_dump($_POST) , '</pre>';
        echo '<pre>' , var_dump($_FILES) , '</pre>';


    }

    //return new insered kelompok id
    private function InsertKelompok() : string
    {
        $tipe =         $_POST['tipe_kelompok'      ];
        $nama =         $_POST['nama_kelompok'      ];
        $angkatan =     $_POST['angkatan'           ];
        $deskripsi =    $_POST['deskripsi_kelompok' ];
        $id_kategori =  $_POST['id_kategori'        ];

        $img = FileUploader::HandleImageUpload('url_logo_toko');
        if(!$img->isSuccess)
        {
            //TODO : Throw Exception Gagal Upload
            throw new UploadFailedException("Gagal Upload File");
        }
        //TODO : Insert and Select Last Kelompok
        return $id;
    }

    private function InsertDetailKelompok(string $kelompokID) : string
    {
        $detailKelompokCount = $_POST['detail_kelompok_count'];
        for ($i = 1; $i <= $detailKelompokCount; $i++){
            $noIdentitas        = $_POST['no_identitas-'.$i];
            $namaPenjual        = $_POST['nama_penjual-'.$i];
        }

        //TODO : Insert and Select Last Kelompok by Kelompok ID
        return $id;
    }

    private function InsertProduk(string $onPostId,string $kelompokID) : string
    {
        $namaProduk         =$_POST['nama_produk-'       .$onPostId];
        $hargaProduk        =$_POST['harga-'             .$onPostId];
        $deskripsiProduk    =$_POST['deskripsi_produk-'  .$onPostId];
        return "";
    }

    private function InsertAllProduk(string $kelompokID) : string
    {
        $produkCount = $_POST['produk_count'];
        $fotoCount = $_POST['foto_count'];

        //TODO : 1 kelompok produknya bisa banyak, insert produk dulu baru foto
        for ($i = 1; $i <= $produkCount; $i++) {


            for ($j = 1; $j <= $fotoCount; $i++) {
                $img = FileUploader::HandleImageUpload('foto-produk-'.$j);
                if(!$img->isSuccess){
                    //TODO : Throw Exception
                }

            }

        }
        return $id;
    }

}
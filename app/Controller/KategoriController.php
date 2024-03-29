<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\Session;
use app\Core\View;
use app\DTO\Kategori\KategoriRequest;
use app\Repository\KategoriRepository;
use app\Service\KategoriService;

class KategoriController
{
    private KategoriService $service;
    private Session $session;
    public function __construct()
    {
        $repo = new KategoriRepository(Database::getConnection());
        $this->service = new KategoriService($repo);
        $this->session = new Session();
    }
    public function index() : void
    {
        View::RenderDashboard("Kategori/index", [
            'title' => 'Kategori',
            'page_type' => 'kategori',
            'hak_akses' => $this->session->Get("hak_akses"),
            'data' => $this->service->GetAllModel()
        ]);
    }

    public function AddKategori():void
    {
        $request = new KategoriRequest();
        $request->id_pengguna= $this->session->Get("id_pengguna");
        $request->nama_kategori=  $_POST['nama_kategori'];
        try
        {
            $this->service->AddKategori($request);
            View::RenderDashboard('Kategori/index', [
                'hak_akses' => $this->session->Get("hak_akses"),
                'success'=> "Berhasil Menambahkan data",
                'data' => $this->service->GetAllModel()
            ]);
        }
        catch (\Exception $exception)
        {
            View::RenderDashboard('Kategori/index', [
                'error'=> $exception->getMessage(),
                'hak_akses' => $this->session->Get("hak_akses"),
                'data' => $this->service->GetAllModel()
            ]);
        }
    }

    public function UpdateKategori():void
    {
        $request = new KategoriRequest();
        $request->id_pengguna= $this->session->Get("id_pengguna");
        $request->nama_kategori=  $_POST['nama_kategori'];
        $request->id_kategori=  $_POST['id_kategori'];
        try
        {
            $this->service->UpdateKategori($request);
            View::RenderDashboard('Kategori/index', [
                'hak_akses' => $this->session->Get("hak_akses"),
                'data' => $this->service->GetAllModel(),
                'success' => "Berhasil Mengubah Kategori"
            ]);
        }
        catch (\Exception $exception)
        {
            View::RenderDashboard('Kategori/index', [
                'hak_akses' => $this->session->Get("hak_akses"),
                'error'=> $exception->getMessage(),
                'data' => $this->service->GetAllModel()
            ]);
        }
    }

    public function DeleteKategori():void
    {
        try
        {
            $id = $_POST['id_kategori'];
            $this->service->RemoveKategori($id);
            View::RenderDashboard('Kategori/index', [
                'hak_akses' => $this->session->Get("hak_akses"),
                'data' => $this->service->GetAllModel(),
                'success' => "Berhasil Menghapus Kategori"
            ]);
        }
        catch (\Exception $exception)
        {
            View::RenderDashboard('Dashboard/index', [
                'error'=> $exception->getMessage()
            ]);
        }
    }
}
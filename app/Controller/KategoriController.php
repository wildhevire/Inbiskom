<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\Session;
use app\Core\View;
use app\DTO\KategoriRequest;
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
                'success'=> "Berhasil Menambahkan data",
                'data' => $this->service->GetAllModel()
            ]);
        }
        catch (\Exception $exception)
        {
            View::RenderDashboard('Kategori/index', [
                'error'=> $exception->getMessage(),
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
            View::Redirect('/dashboard-kategori');
        }
        catch (\Exception $exception)
        {
            View::RenderDashboard('Kategori/index', [
                'error'=> $exception->getMessage()
            ]);
        }
    }

    public function DeleteKategori():void
    {
        try
        {
            $id = $_POST['id_kategori'];
            $this->service->RemoveKategori($id);
            View::Redirect('/dashboard-kategori');
        }
        catch (\Exception $exception)
        {
            View::RenderDashboard('Dashboard/index', [
                'error'=> $exception->getMessage()
            ]);
        }
    }
}
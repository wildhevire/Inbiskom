<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\Session;
use app\Core\View;
use app\DTO\DetailKelompok\DetailKelompokRequest;
use app\Repository\DetailKelompokRepository;
use app\Repository\KelompokRepository;
use app\Service\DetailKelompokService;
use app\Service\KelompokService;

class PenjualController
{
    private DetailKelompokService $service;
    private Session $session;
    private DetailKelompokRepository $repo;
    private KelompokRepository $kelompokRepository;
    private KelompokService $kelompokService;
    public function __construct()
    {
        $this->repo = new DetailKelompokRepository(Database::getConnection());
        $this->kelompokRepository = new KelompokRepository(Database::getConnection());
        $this->service = new DetailKelompokService($this->repo);
        $this->session = new Session();
        $this->kelompokService = new KelompokService($this->kelompokRepository);
    }
    public function index(){
//        echo '<pre>' , var_dump($this->kelompokService->GetAllModel()) , '</pre>';
        View::RenderDashboard("Penjual/index", [
            'title' => 'Penjual',
            'page_type' => 'penjual',
            'penjual' => $this->service->GetPenggunaAndKelompok(),
            'kelompok' => $this->kelompokService->GetAllModel()
        ]);
    }
    public function UpdatePenjual(){
//       echo '<pre>' , var_dump($_POST) , '</pre>';

        $idDetailKelompok = $_POST['id_penjual'];
        $noIdentitas = $_POST['no_identitas'];
        $namaPenjual = $_POST['nama_penjual'];
        $tipeKelompok = $_POST['tipe_kelompok'];
        $idKelompok = $_POST['kelompok'];
        $request = new DetailKelompokRequest();
        $request->id_kelompok = $idKelompok;
        $request->nama_penjual = $namaPenjual;
        $request->no_identitas = $noIdentitas;
        $request->id_detail_kelompok = $idDetailKelompok;

        $this->service->UpdatePenjual($request);
        View::Redirect("dashboard-penjual");
    }

    public function AddPenjual(){
       echo '<pre>' , var_dump($_POST) , '</pre>';

//        $idDetailKelompok = $_POST['id_penjual'];
//        $noIdentitas = $_POST['no_identitas'];
//        $namaPenjual = $_POST['nama_penjual'];
//        $tipeKelompok = $_POST['tipe_kelompok'];
//        $idKelompok = $_POST['kelompok'];
//        $request = new DetailKelompokRequest();
//        $request->id_kelompok = $idKelompok;
//        $request->nama_penjual = $namaPenjual;
//        $request->no_identitas = $noIdentitas;
//        $request->id_detail_kelompok = $idDetailKelompok;
//
//        $this->service->UpdatePenjual($request);
//        View::Redirect("dashboard-penjual");
        $no_identitas = $_POST["no_identitas"];
        $nama = $_POST["nama_penjual"];
        $id_kelompok = $_POST["kelompok"];
        $req = new DetailKelompokRequest();
        $req->nama_penjual = $nama;
        $req->id_kelompok = $id_kelompok;
        $req->no_identitas = $no_identitas;
        try {

            $this->service->AddPenjual($req);
            View::Redirect('/dashboard-penjual');
        }
        catch (\Exception $e)
        {
            View::RenderDashboard('Penjual/index', [
                'error'=> $e->getMessage()
            ]);
            throw $e;
        }


    }

    public function DeletePenjual()
    {
        $id = $_POST['id_kelompok'];

        try {
            $this->service->DeleteKelompokById($id);
            View::Redirect("/dashboard-penjual");
        }
        catch (\Exception $e)
        {
            View::RenderDashboard('Penjual/index', [
                'error'=> $e->getMessage()
            ]);
            throw $e;
        }

    }
}
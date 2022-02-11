<?php

namespace app\Controller;

use app\Core\Session;
use app\Core\View;


use app\Config\Database;
use app\Repository\OverviewRepository;
use app\Service\OverviewService;

class DashboardController
{
    private OverviewRepository $repository;
    private OverviewService $service;
    private Session $session;
    public function __construct()
    {
       $this->repository =  new OverviewRepository(Database::getConnection());
        $this->service = new OverviewService($this->repository);
        $this->session = new Session();
    }

//private function filter_a($var): bool
//    {
//        return strtolower($var["tipe_kelompok"]) == "umum";
//    }
//private function filter_b($var): bool
//    {
//        return strtolower($var["tipe_kelompok"]) == "mahasiswa";
//    }
    public function index() : void{
        View::RenderDashboard("Dashboard/index", [
            'title' => 'Home',
            'page_type' => 'dashboard',
            'hak_akses' => $this->session->Get("hak_akses"),
            'pendaftar_pertahun' => $this->service->SelectPendaftarPerTahun(),
            'produk_perkategori' => $this->service->SelectProdukPerKategori(),
            'penjual_pertipe' => $this->service->SelectPenjualPerTipe(),
            'total_produk'=>$this->service->SelectTotalProduk(),
            'total_kelompok'=>$this->service->SelectTotalKelompok(),
            'total_penjual'=>$this->service->SelectTotalPenjual(),
        ]);

//        echo '<pre>' , var_dump($this->service->SelectPenjualPerKategori()) , '</pre>';



//
//        $data = $this->service->SelectPenjualPerKategori();
//        $kategoriPerTipe = array();
//        $kategoriPerTipe['umum'] = array_filter($data, "filter_a");
//        $kategoriPerTipe['mahasiswa'] = array_filter($data, "filter_b");
//
//        echo '<pre>' , var_dump($kategoriPerTipe) , '</pre>';


    }




}
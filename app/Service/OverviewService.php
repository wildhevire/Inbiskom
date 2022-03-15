<?php

namespace app\Service;

use app\Exception\DatabaseQueryException;
use app\Repository\OverviewRepository;

class OverviewService
{
    private OverviewRepository $repo;
    public function __construct(OverviewRepository $repo)
    {
        $this->repo = $repo;
    }
    public function SelectPendaftarPerTahun(): ?array
    {
        if(empty($_GET['angkatan'])){
            $tahun = date("Y");
        }else{
            $tahun = $_GET['angkatan'];
        }

        $result = $this->repo->SelectPendaftarPerTahun($tahun);
        // if($result == null){
        //     //TODO : Exception Message
        //     throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        // }
        return $result;
    }

    public function SelectProdukPerKategori(): ?array
    {
        if(empty($_GET['angkatan'])){
            $tahun = date("Y");
        }else{
            $tahun = $_GET['angkatan'];
        }
        
        $result = $this->repo->SelectProdukPerKategori($tahun);
        // if($result == null){
        //     //TODO : Exception Message
        //     throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        // }
        return $result;
    }

    public function SelectPenjualPerTipe(): ?array
    {
        if(empty($_GET['angkatan'])){
            $tahun = date("Y");
        }else{
            $tahun = $_GET['angkatan'];
        }
        
        $result = $this->repo->SelectPenjualPerTipe($tahun);
        // if($result == null){
        //     //TODO : Exception Message
        //     throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        // }
        return $result;
    }

    public function SelectPenjualPerKategori(): ?array
    {
        $result = $this->repo->SelectPenjualPerKategori();
        // if($result == null){
        //     //TODO : Exception Message
        //     throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        // }
        return $result;
    }

    public function SelectTotalProduk(): ?array
    {
        $result = $this->repo->SelectTotalProduk();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }
    public function SelectTotalKelompok(): ?array
    {
        $result = $this->repo->SelectTotalKelompok();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }
    public function SelectTotalPenjual(): ?array
    {
        $result = $this->repo->SelectTotalPenjual();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }
}
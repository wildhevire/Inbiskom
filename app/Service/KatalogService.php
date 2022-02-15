<?php

namespace app\Service;

use app\Exception\DatabaseQueryException;
use app\Repository\KatalogRepository;

class KatalogService
{
    private KatalogRepository $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function GetAllModelHome(string $nama_kategori, int $limit)
    {
        $result = $this->repo->SelectForHome($nama_kategori, $limit);
//        if($result == null){
//            //TODO : Exception Message
//            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
//        }
        return $result;
    }

    public function GetProduk(string $id_produk)
    {
        $result = $this->repo->SelectForDetail($id_produk);
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function GetKonfigurasi()
    {
        $result = $this->repo->SelectAllKonfigurasi();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function GetNoWa()
    {
        $result = $this->repo->SelectNoWa();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function GetTokoDescription(string $id_produk)
    {
        $result = $this->repo->SelectForDetailToko($id_produk);
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function GetTokoDescriptionMember(string $id_produk)
    {
        $result = $this->repo->SelectForDetailTokoMember($id_produk);
//        if($result == null){
//            //TODO : Exception Message
//            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
//        }
        return $result;
    }

    public function GetTokoDescriptionProducts(string $id_produk)
    {
        $result = $this->repo->SelectForDetailTokoProducts($id_produk);
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function GetSearchResultProduct(string $nama_produk, string $id_kategori, string $angkatan, string $hargaMin, string $hargaMax)
    {
        $result = $this->repo->SearchProducts($nama_produk, $id_kategori, $angkatan, $hargaMin, $hargaMax);
        // if($result == null){
        //     //TODO : Exception Message
        //     throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        // }
        return $result;
    }

    public function GetSearchResultToko(string $nama_toko, string $id_kategori, string $angkatan)
    {
        $result = $this->repo->SearchToko($nama_toko, $id_kategori, $angkatan);
        // if($result == null){
        //     //TODO : Exception Message
        //     throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        // }
        return $result;
    }

}
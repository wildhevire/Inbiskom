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
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
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

}
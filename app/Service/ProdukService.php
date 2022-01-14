<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Produk;
use app\DTO\Produk\ProdukRequest;
use app\DTO\Produk\ProdukResponse;
use app\Exception\DatabaseQueryException;
use app\Repository\ProdukRepository;

class ProdukService
{
    private ProdukRepository $repo;
    public function __construct(ProdukRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddProduk(ProdukRequest $request) : ProdukResponse
    {
        try
        {
            Database::BeginTransaction();
            $produk = new Produk();
            $produk->id_kelompok = $request->id_kelompok;
            $produk->deskripsi_produk = $request->deskripsi_produk;
            $produk->harga = $request->harga;
            $produk->nama_produk = $request->nama_produk;

            $result = $this->repo->Insert($produk);
            $response = new ProdukResponse();
            $response->id_kelompok = $result->id_kelompok;
            $response->deskripsi_produk = $result->deskripsi_produk;
            $response->harga = $result->harga;
            $response->nama_produk = $result->nama_produk;
            Database::CommitTransaction();
            return $response;
        }
        catch (\Exception $e)
        {
            Database::RollbackTransaction();
            throw $e;
        }
    }
    public function GetAllModel()
    {
        $result = $this->repo->SelectAll();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function UpdateProduk(ProdukRequest $request)
    {
        try {
            $produk = new Produk();
            $produk->nama_produk = $request->id_kelompok;
            $produk->harga = $request->nama_kelompok;
            $produk->deskripsi_produk = $request->angkatan;
            $produk->id_produk = $request->deskripsi_kelompok;
            $this->repo->Update($produk);
            return $produk;
        }catch (\Exception $e)
        {
            throw $e;
        }
    }
}
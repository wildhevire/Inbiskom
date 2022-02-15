<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Foto;
use app\DTO\Foto\FotoRequest;
use app\DTO\Foto\FotoResponse;
use app\Exception\DatabaseQueryException;
use app\Repository\FotoRepository;

class FotoService
{
    private FotoRepository $repo;

    public function __construct(FotoRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddFoto(FotoRequest $request) : FotoResponse
    {
        try
        {
            Database::BeginTransaction();
            $foto = new Foto();
            $foto->id_produk = $request->id_produk;
            $foto->is_primary = $request->is_primary;
            $foto->url = $request->url;
            $this->repo->Insert($foto);

            $response = new FotoResponse();
            Database::CommitTransaction();
            return $response;
        }
        catch (\Exception $e)
        {
            Database::RollbackTransaction();
            throw $e;
        }
    }

    public function DeleteFotoById(string $id)
    {
        try {
            $this->repo->DeleteById($id);
        }catch (\Exception $e)
        {
            throw $e;
        }
    }

    public function GetAllModel(){
        $result = $this->repo->SelectAll();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }
    public function GetFotoForProduk($id_produk)
    {
        $result = $this->repo->SelectByIdProduk($id_produk);
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function GetFotoForKelompok($id_kelompok)
    {
        $result = $this->repo->SelectByKelompok($id_kelompok);
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

    public function Update(Foto $request)
    {
        try {
            $foto = new Foto();
            $foto->id_foto = $request->id_foto;
            $foto->url = $request->url;
            $foto->is_primary = $request->is_primary;
            $this->repo->Update($foto);
        }catch (\Exception $e)
        {
            throw $e;
        }
    }
    //TODO: Tambah GetModelByProduk dan action lain di katalog
}
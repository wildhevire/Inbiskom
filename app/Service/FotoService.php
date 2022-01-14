<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Foto;
use app\DTO\Foto\FotoRequest;
use app\DTO\Foto\FotoResponse;
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

    //TODO: Tambah GetModelByProduk dan action lain di katalog
}
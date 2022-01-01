<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Kategori;
use app\DTO\KategoriRequest;
use app\DTO\KategoriResponse;
use app\Exception\DataAlreadyExistException;
use app\Exception\DatabaseQueryException;
use app\Repository\KategoriRepository;

class KategoriService
{
    private KategoriRepository $repo;

    public function __construct(KategoriRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddKategori(KategoriRequest $request) : KategoriResponse
    {
        try
        {
            Database::BeginTransaction();
            $kategori = $this->repo->SelectByNama($request->nama_kategori);
            if($kategori != null)
            {
                //TODO: Exception Message
                throw new DataAlreadyExistException("Kategori sudah ada");
            }
            $kategori = new Kategori();
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->id_pengguna = $request->id_pengguna;
            $this->repo->Insert($kategori);

            $response = new KategoriResponse();
            $response->kategori = $kategori;
            Database::CommitTransaction();
            return $response;
        }
        catch (\Exception $e)
        {
            Database::RollbackTransaction();
            throw $e;
        }
    }

    public function UpdateKategori(KategoriRequest $request)
    {
        try {
            $kategori = new Kategori();
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->id_pengguna = $request->id_pengguna;
            $kategori->id_kategori = $request->id_kategori;
            $this->repo->Update($kategori);
        }catch (\Exception $e)
        {
            throw $e;
        }
    }

    public function RemoveKategori(string $id)
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
}


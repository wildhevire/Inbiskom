<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Kelompok;
use app\DTO\Kelompok\KelompokRequest;
use app\DTO\Kelompok\KelompokResponse;
use app\Repository\KelompokRepository;

class KelompokService
{
    public KelompokRepository $repo;

    public function __construct(KelompokRepository $repo)
    {
        $this->repo = $repo;
    }
    public function AddKelompok(KelompokRequest $request) : KelompokResponse
    {
        try
        {
            Database::BeginTransaction();
            $kelompok = new Kelompok();
            //$kelompok->id_kelompok = $request->id_kelompok;
            $kelompok->nama_kelompok = $request->nama_kelompok;
            $kelompok->angkatan = $request->angkatan;
            $kelompok->deskripsi_kelompok = $request->deskripsi_kelompok;
            $kelompok->tipe_kelompok = $request->tipe_kelompok;
            $kelompok->url_logo_toko = $request->url_logo_toko;
            $kelompok->id_kategori = $request->id_kategori;
            $kelompok->id_pengguna = $request->id_pengguna;
            $result = $this->repo->Insert($kelompok);

            $response = new KelompokResponse();
            $response->id_kelompok = $result->id_kelompok;
            $response->nama_kelompok = $kelompok->nama_kelompok;
            $response->angkatan = $kelompok->angkatan;
            $response->deskripsi_kelompok = $kelompok->deskripsi_kelompok;
            $response->tipe_kelompok = $kelompok->tipe_kelompok;
            $response->url_logo_toko = $kelompok->url_logo_toko;
            $response->id_kategori = $kelompok->id_kategori;
            $response->id_pengguna = $kelompok->id_pengguna;

            Database::CommitTransaction();

            return $response;
        }
        catch (\Exception $e)
        {
            Database::RollbackTransaction();
            throw $e;
        }
    }

    public function UpdateKelompok(KelompokRequest $request)
    {
        try {
            $kelompok = new Kelompok();
            $kelompok->id_kelompok = $request->id_kelompok;
            $kelompok->nama_kelompok = $request->nama_kelompok;
            $kelompok->angkatan = $request->angkatan;
//            $kelompok->deskripsi_kelompok = $request->deskripsi_kelompok;
            $kelompok->tipe_kelompok = $request->tipe_kelompok;
//            $kelompok->url_logo_toko = $request->url_logo_toko;
            $kelompok->id_kategori = $request->id_kategori;
            $kelompok->id_pengguna = $request->id_pengguna;
            $this->repo->Update($kelompok);

            //DELETE THIS LATER JUST GARBAGE

        }catch (\Exception $e)
        {
            throw $e;
        }
    }

    public function GetCountGroup(string $id)
    {
        try {
            return $this->repo->GetCount($id);
        } catch (\Exception $e) 
        {
            throw $e;
        }
    }

    public function DeleteKelompokById(string $id)
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
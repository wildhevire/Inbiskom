<?php

namespace app\Service;


use app\Config\Database;
use app\DBModel\DetailKelompok;
use app\DTO\DetailKelompok\DetailKelompokRequest;
use app\DTO\DetailKelompok\DetailKelompokResponse;
use app\Repository\DetailKelompokRepository;

class DetailKelompokService
{
    public DetailKelompokRepository $repo;

    public function __construct(DetailKelompokRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddPenjual(DetailKelompokRequest $request) : DetailKelompokResponse
    {
        try
        {
            Database::BeginTransaction();
            $anggota = new DetailKelompok();
            $anggota->id_kelompok = $request->id_kelompok;
            $anggota->nama_penjual = $request->nama_penjual;
            $anggota->no_identitas = $request->no_identitas;
            $this->repo->Insert($anggota);

            $response = new DetailKelompokResponse();
            $response->id_kelompok = $anggota->id_kelompok;
            $response->nama_penjual = $anggota->nama_penjual;
            $response->no_identitas = $anggota->no_identitas;
            Database::CommitTransaction();
            return $response;
        }
        catch (\Exception $e)
        {
            Database::RollbackTransaction();
            throw $e;
        }
    }

    public function UpdatePenjual(DetailKelompokRequest $request)
    {
        try {
            $anggota = new DetailKelompok();
            $anggota->id_kelompok = $request->id_kelompok;
            $anggota->nama_penjual = $request->nama_penjual;
            $anggota->no_identitas = $request->no_identitas;
            $this->repo->Update($anggota);
        }catch (\Exception $e)
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
}
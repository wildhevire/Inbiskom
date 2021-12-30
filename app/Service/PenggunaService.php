<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Pengguna;
use app\DTO\AddPenggunaRequest;
use app\DTO\AddPenggunaResponse;
use app\Exception\ValidationException;
use app\Repository\PenggunaRepository;

class PenggunaService
{
    private PenggunaRepository $repo;

    public function AddPengguna(AddPenggunaRequest $request) : AddPenggunaResponse
    {
        $this->ValidateAddPengguna($request);
        try
        {
            Database::BeginTransaction();

            $pengguna = $this->repo->SelectById($request->id_pengguna);
            if($pengguna != null)
            {
                throw new ValidationException("Pengguna Dengan No Identitas Tersebut Sudah ada");
            }

            $pengguna = new Pengguna();
            $pengguna->id_pengguna = $request->id_pengguna;
            $pengguna->nama_pengguna = $request->nama_pengguna;
            $pengguna->username = $request->username;
            $pengguna->password = password_hash($pengguna->password, PASSWORD_BCRYPT);
            $pengguna->hak_akses = $request->hak_akses;
            $pengguna->status = $request->status;
            $pengguna->tahun_aktif = $request->tahun_aktif;

            $response = new AddPenggunaResponse();
            $response->pengguna = $pengguna;

            Database::CommitTransaction();

            return $response;

        }
        catch (\Exception $exception)
        {
            Database::RollbackTransaction();
            throw $exception;
        }
    }

    private function ValidateAddPengguna(AddPenggunaRequest $req)
    {
        if($req->id_pengguna == null || $req->username == null ||
            $req->nama_pengguna == null || $req->password == null ||
            $req->hak_akses == null || $req->status == null || $req->tahun_aktif == null)
        {
            throw new ValidationException("Data Tidak Boleh Kosong");
        }

        if(trim($req->id_pengguna) == "" || trim($req->username) == "" || trim($req->nama_pengguna) == "" ||
            trim($req->password) == "" || trim($req->hak_akses) == "" || trim($req->status) == "" ||
            trim($req->tahun_aktif) == "")
        {
            throw new ValidationException("Data Tidak Boleh Kosong");
        }

        //TODO : Mungkin nanti bisa ditambah validation lain selain cek data kosong
    }
}
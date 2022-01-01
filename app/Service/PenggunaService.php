<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Pengguna;
use app\DTO\AddPenggunaRequest;
use app\DTO\AddPenggunaResponse;
use app\DTO\LoginPenggunaRequest;
use app\DTO\LoginPenggunaResponse;
use app\Exception\DatabaseQueryException;
use app\Exception\ValidationException;
use app\Repository\PenggunaRepository;
use function PHPUnit\Framework\throwException;

class PenggunaService
{
    private PenggunaRepository $repo;

    public function __construct(PenggunaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddPengguna(AddPenggunaRequest $request) : AddPenggunaResponse
    {
        $this->ValidateAddPengguna($request);
        try
        {
            Database::BeginTransaction();

            $pengguna = $this->repo->SelectByUsername($request->username);
            if($pengguna != null)
            {
                //TODO : Ganti Error Message
                throw new ValidationException("Pengguna Dengan No Identitas Tersebut Sudah ada");
            }

            $pengguna = new Pengguna();
            $pengguna->nama_pengguna = $request->nama_pengguna;
            $pengguna->username = $request->username;
            $pengguna->hak_akses = $request->hak_akses;
            $pengguna->status = $request->status;
            $pengguna->tahun_aktif = $request->tahun_aktif;
            $pengguna->password = password_hash($request->password, PASSWORD_BCRYPT);
            //$pengguna->password = $request->password;
            $this->repo->Insert($pengguna);

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
        if( $req->username == null ||
            $req->nama_pengguna == null || $req->password == null ||
            $req->hak_akses == null || $req->status == null || $req->tahun_aktif == null)
        {
            //TODO : Ganti Error Message
            throw new ValidationException("Data Tidak Boleh Kosong");
        }

        if( trim($req->username) == "" || trim($req->nama_pengguna) == "" ||
            trim($req->password) == "" || trim($req->hak_akses) == "" || trim($req->status) == "" ||
            trim($req->tahun_aktif) == "")
        {
            //TODO : Ganti Error Message
            throw new ValidationException("Data Tidak Boleh Kosong");
        }

        //TODO : Mungkin nanti bisa ditambah validation lain selain cek data kosong
    }

    public function Login(LoginPenggunaRequest $request) : LoginPenggunaResponse
    {
        $this->ValidateLogin($request);
        $pengguna = $this->repo->SelectByUsername($request->username);
        if($pengguna == null)
        {
            //TODO : Mungkin Exception Message Bisa Diganti
            throw new ValidationException("Penggna tidak ada");
        }

        if(password_verify($request->password, $pengguna->password))
        {
            $response = new LoginPenggunaResponse();
            $response->username = $pengguna->username;
            $response->hak_akses = $pengguna->hak_akses;
            $response->id_pengguna = $pengguna->id_pengguna;
            return $response;
        }
        else
        {
            //TODO : Mungkin Exception Message Bisa Diganti
            throw new ValidationException("Password salah");
        }
    }

    private function ValidateLogin(LoginPenggunaRequest $req)
    {
        //TODO : Mungkin Exception Message Bisa Diganti
        //TODO : Mungkin nanti bisa ditambah validasi lain
        if($req->username == null || $req->password == null) {
            throw new ValidationException("Username dan/atau Password Tidak Boleh Kosong");
        }
        if(trim($req->username )== '' || trim($req->password)== '')
        {
            throw new ValidationException("Username dan/atau Password Tidak Boleh Kosong");
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
}
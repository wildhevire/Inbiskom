<?php

namespace app\Service;

use app\Config\Database;
use app\DBModel\Konfigurasi;
use app\DTO\Konfigurasi\KonfigurasiRequest;
use app\DTO\Konfigurasi\KonfigurasiResponse;
use app\Exception\DatabaseQueryException;
use app\Repository\KonfigurasiRepository;

class KonfigurasiService
{
    private KonfigurasiRepository $repo;

    public function __construct(KonfigurasiRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddKonfigurasi(KonfigurasiRequest $request)
    {
        try
        {
            Database::BeginTransaction();
            //$konfigurasi = $this->repo->SelectLast();
//            if($konfigurasi != null)
//            {
//                //TODO: Exception Message
//                throw new DataAlreadyExistException("Konfigurasi sudah ada");
//            }
            $konfigurasi = new Konfigurasi();
            //$konfigurasi->id_konfigurasi = $request->id_konfigurasi;
            $konfigurasi->nip = $request->nip;
            $konfigurasi->nama_ketua = $request->nama_ketua;

            $konfigurasi->alamat_inibiskom = $request->alamat_inibiskom;
            $konfigurasi->no_hp = $request->no_hp;
            $konfigurasi->no_wa = $request->no_wa;
            $konfigurasi->email = $request->email;
            $konfigurasi->username_ig = $request->username_ig;
            $konfigurasi->id_pengguna = $request->id_pengguna;

            $konfigurasi->url_logo = $request->url_logo;
            if(empty($konfigurasi->url_logo))
            {
                $this->repo->Update($konfigurasi);
            } else
            {
                $this->repo->UpdateWithLogo($konfigurasi);
            }




//            $this->repo->Insert($konfigurasi);

            $response = new KonfigurasiResponse();

            Database::CommitTransaction();
            return $response;
        }
        catch (\Exception $e)
        {
            Database::RollbackTransaction();
            throw $e;
        }
    }

    public function GetAllModel(){
        $result = $this->repo->SelectLast();
        if($result == null){
            //TODO : Exception Message
            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
        }
        return $result;
    }

}
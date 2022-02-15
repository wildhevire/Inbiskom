<?php

namespace app\Service;

use app\DBModel\Banner;
use app\DTO\Banner\BannerRequest;
use app\Exception\DatabaseQueryException;
use app\Repository\BannerRepository;

class BannerService
{
    private BannerRepository $repo;
    public function __construct(BannerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function GetAllModel(){
        $result = $this->repo->SelectAll();
//        if($result == null){
//            //TODO : Exception Message
//            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
//        }
        return $result;
    }
    public function GetAllActiveModel(){
        $result = $this->repo->SelectAcive();
//        if($result == null){
//            //TODO : Exception Message
//            throw new DatabaseQueryException("Tidak dapat mengambil data dari database.");
//        }
        return $result;
    }

    public function AddBanner(BannerRequest $request)
    {
        try
        {
            $banner = new Banner();
            $banner->url_banner = $request->url_banner;
//            $banner->status = $request->status;
            $banner->id_pengguna = $request->id_pengguna;
            $this->repo->Insert($banner);
        }
        catch (\Exception $e)
        {
            throw $e;
        }

    }

    public function Deactivate($id)
    {
        try
        {
            $this->repo->Deactivate($id);
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }
}
<?php

namespace app\Service;


use app\Repository\DetailKelompokRepository;

class DetailKelompokService
{
    public DetailKelompokRepository $repo;

    public function __construct(DetailKelompokRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddKelompok()
    {

    }
}
<?php

namespace app\Service;

use app\Repository\KategoriRepository;

class KategoriService
{
    private KategoriRepository $repo;

    public function __construct(KategoriRepository $repo)
    {
        $this->repo = $repo;
    }

    public function AddKategori()
    {

    }

    public function UpdateKategori()
    {

    }

    public function RemoveKategori()
    {

    }
}
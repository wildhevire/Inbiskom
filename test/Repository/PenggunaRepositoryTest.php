<?php

namespace app\Repository;

use app\Config\Database;
use app\DBModel\Pengguna;
use PHPUnit\Framework\TestCase;

class PenggunaRepositoryTest extends TestCase
{
    private PenggunaRepository $repo;
    protected function setUp(): void
    {
        $this->repo = new PenggunaRepository(Database::getConnection());
        $this->repo->DeleteAll();
    }

    public function testInset()
    {
        $user = new Pengguna();
        $user->id_pengguna = '3';
        $user->nama_pengguna = 'Wildan Muhammad Fikri';
        $user->username = 'will';
        $user->password = 'rahasia';
        $user->hak_akses = 'kepala_divisi';
        $user->status = '1';
        $user->tahun_aktif = '2020';
        //$this->repo->
        $result = $this->repo->Insert($user);
        //self::assertEquals($user->id_pengguna, $result->id_pengguna);
    }

    public function testFindById()
    {
        $user = $this->repo->SelectById("2");
        self::assertNull($user);
    }
}

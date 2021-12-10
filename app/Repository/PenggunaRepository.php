<?php

namespace app\Repository;

use app\DBModel\Pengguna;

class PenggunaRepository
{
    private \PDO $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function Insert(Pengguna $pengguna): Pengguna
    {
        $statement = $this->conn->prepare(
            "INSERT INTO pengguna(nama_pengguna, username, password, hak_akses, status, tahun_aktif) 
                    values(?,?,?,?,?,?)"
        );
        $statement->execute([
            $pengguna->nama_pengguna,
            $pengguna->username,
            $pengguna->password,
            $pengguna->hak_akses,
            $pengguna->status,
            $pengguna->tahun_aktif
        ]);
        return $pengguna;

    }

    public function SelectById(string $id): ?Pengguna
    {
        $statement = $this->conn->prepare(
            "SELECT id_pengguna, nama_pengguna, username, password, hak_akses, status, tahun_aktif
                    FROM pengguna WHERE id_pengguna= ?");
        $statement->execute([$id]);
        try {
            if ($row = $statement->fetch()) {
                $pengguna = new Pengguna();
                $pengguna->id_pengguna = $row['id_pengguna'];
                $pengguna->nama_pengguna = $row['nama_pengguna'];
                $pengguna->username = $row['username'];
                $pengguna->password = $row['password'];
                $pengguna->hak_akses = $row['hak_akses'];
                $pengguna->status = $row['status'];
                $pengguna->tahun_aktif = $row['tahun_aktif'];
                return $pengguna;
            } else {
                return null;
            }

        } finally {
            $statement->closeCursor();
        }
    }

    public function DeleteAll(): void
    {
        $this->conn->exec("DELETE FROM pengguna");
    }

    public function SelectAll(): ?array
    {
        return null;
    }
}
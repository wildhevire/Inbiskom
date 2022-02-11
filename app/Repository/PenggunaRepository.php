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
    public function SelectByUsername(string $name): ?Pengguna
    {
        $statement = $this->conn->prepare(
            "SELECT id_pengguna, nama_pengguna, username, password, hak_akses, status, tahun_aktif
                    FROM pengguna WHERE username= ?");
        $statement->execute([$name]);
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

    public function DeleteById(strint $id): void
    {
        $statement = $this->conn->prepare("DELETE FROM pengguna WHERE id_pengguna = ?");
        $statement->execute([$id]);
    }

    public function SelectAll(): ?array
    {
        $statement = $this->conn->query(
            "SELECT id_pengguna, nama_pengguna, username, 
                    hak_akses, status, tahun_aktif
                    FROM pengguna");

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }




    public function Update(Pengguna $pengguna) : Pengguna
    {
        $statement = $this->connection->prepare("
                UPDATE pengguna SET nama_pengguna = ?, username = ?, 
                                hak_akses = ?, status = ?, tahun_aktif = ? 
                WHERE id_pengguna = ?,
            ");
        $statement->execute([
            $pengguna->nama_pengguna,
            $pengguna->username,
            $pengguna->hak_akses,
            $pengguna->status,
            $pengguna->tahun_aktif,
            $pengguna->id_pengguna,

        ]);
        return $pengguna;
    }

    public function UpdatePasword(Pengguna $pengguna):Pengguna
    {
        $statement = $this->conn->prepare("
               UPDATE pengguna SET password = ? WHERE id_pengguna = ?");

        $statement->execute([
            $pengguna->password,
            $pengguna->id_pengguna
]       );
        return $pengguna;
    }
    public function UpdateStatus(string $id, bool $status):void
    {
        $statusInDB = 0;
        if($status){
            $statusInDB = 1;
        }

        $statement = $this->conn->prepare("UPDATE pengguna SET status= ? WHERE id_pengguna = ?");
        $statement->execute([$statusInDB, $id]);
    }
}
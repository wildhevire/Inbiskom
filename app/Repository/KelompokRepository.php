<?php

namespace app\Repository;

use app\DBModel\Kelompok;

class KelompokRepository
{
    private \PDO $conn;

    /**
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function Insert(Kelompok $kelompok): Kelompok
    {
        $statement = $this->conn->prepare(
            "INSERT INTO kelompok(id_kelompok, nama_kelompok, angkatan, deskripsi_kelompok, tipe_kelompok, url_logo_toko, id_kategori, id_pengguna) values (?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $statement->execute([
            $kelompok->id_kelompok,
            $kelompok->nama_kelompok,
            $kelompok->angkatan,
            $kelompok->deskripsi_kelompok,
            $kelompok->tipe_kelompok,
            $kelompok->url_logo_toko,
            $kelompok->id_kategori,
            $kelompok->id_pengguna
        ]);
        return $kelompok;
    }

    public function SelectById(string $id): ?Kelompok
    {
        $statement = $this->conn->prepare(
            "SELECT id_kelompok, nama_kelompok, angkatan, deskripsi_kelompok, tipe_kelompok, url_logo_toko, id_kategori, id_pengguna FROM kelompok WHERE id_kelompok= ?"
        );
        $statement->execute([$id]);
        try {
            if ($row = $statement->fetch()) {
                $kelompok = new Kelompok();
                $kelompok->id_kelompok = $row['id_kelompok'];
                $kelompok->nama_kelompok = $row['nama_kelompok'];
                $kelompok->angkatan = $row['angkatan'];
                $kelompok->deskripsi_kelompok = $row['deskripsi_kelompok'];
                $kelompok->tipe_kelompok = $row['tipe_kelompok'];
                $kelompok->url_logo_toko = $row['url_logo_toko'];
                $kelompok->id_kategori = $row['id_kategori'];
                $kelompok->id_pengguna = $row['id_pengguna'];
                return $kelompok;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function DeleteAll(): void
    {
        $this->conn->exec("DELETE FROM kelompok");
    }

    public function SelectAll(): ?array
    {
        return null;
    }

}
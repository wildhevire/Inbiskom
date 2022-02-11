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
            "INSERT INTO kelompok(nama_kelompok, angkatan, deskripsi_kelompok, tipe_kelompok, url_logo_toko, id_kategori, id_pengguna) values (?, ?, ?, ?, ?, ?, ?)"
        );
        $statement->execute([

            $kelompok->nama_kelompok,
            $kelompok->angkatan,
            $kelompok->deskripsi_kelompok,
            $kelompok->tipe_kelompok,
            $kelompok->url_logo_toko,
            $kelompok->id_kategori,
            $kelompok->id_pengguna
        ]);
        $lastId = $this->conn->lastInsertId();
        $kelompok->id_kelompok = $lastId;
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
        // $statement = $this->conn->query(
        //     "SELECT id_kelompok, nama_kelompok, angkatan, 
        //             deskripsi_kelompok, tipe_kelompok, url_logo_toko
        //             FROM kelompok");

        $statement = $this->conn->query(
            "SELECT kelompok.id_kelompok,
            (SELECT COUNT(*) FROM detail_kelompok WHERE kelompok.id_kelompok=detail_kelompok.id_kelompok) AS jumlah_anggota,
            (SELECT COUNT(*) FROM produk WHERE kelompok.id_kelompok=produk.id_kelompok) AS jumlah_produk,
            (SELECT id_kategori FROM kategori WHERE kelompok.id_kategori=kategori.id_kategori) AS id_kategori,
            (SELECT nama_kategori FROM kategori WHERE kelompok.id_kategori=kategori.id_kategori) AS kategori,
            nama_kelompok, angkatan, deskripsi_kelompok, tipe_kelompok, url_logo_toko
        FROM kelompok"
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function DeleteById(string $id): void
    {
        $statement = $this->conn->prepare("DELETE FROM kelompok WHERE id_kelompok = ?");
        $statement->execute([$id]);
    }

    public function GetCount(int $id): ?array
    {
        $statement = $this->conn->prepare("
        SELECT COUNT(nama_penjual)
        FROM detail_kelompok, kelompok 
        WHERE detail_kelompok.id_kelompok=kelompok.id_kelompok AND kelompok.id_kelompok=?
        GROUP BY detail_kelompok.id_kelompok
        ");

        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                return $row;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function Update(Kelompok $kelompok) : Kelompok
    {
//        $statement = $this->conn->prepare("
//                UPDATE kelompok SET nama_kelompok = ?, angkatan = ?, deskripsi_kelompok = ?, tipe_kelompok = ?, url_logo_toko = ?, id_kategori = ?, id_pengguna = ?
//                WHERE id_kelompok = ?,
//            ");
        $statement = $this->conn->prepare("
                UPDATE kelompok SET nama_kelompok = ?, angkatan = ?, 
                                    tipe_kelompok = ?, 
                                    id_kategori = ?, id_pengguna = ?
                WHERE id_kelompok = ?
            ");
//        $statement->execute([
//            $kelompok->nama_kelompok,
//            $kelompok->angkatan,
//            $kelompok->deskripsi_kelompok,
//            $kelompok->tipe_kelompok,
//            $kelompok->url_logo_toko,
//            $kelompok->id_kategori,
//            $kelompok->id_pengguna,
//            $kelompok->id_kelompok
//        ]);
        $statement->execute([
            $kelompok->nama_kelompok,
            $kelompok->angkatan,
            $kelompok->tipe_kelompok,
            $kelompok->id_kategori,
            $kelompok->id_pengguna,
            $kelompok->id_kelompok
        ]);
        return $kelompok;
    }
}
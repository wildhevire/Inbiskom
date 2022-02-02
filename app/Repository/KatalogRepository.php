<?php

namespace app\Repository;

class KatalogRepository
{
    private \PDO $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function SelectForHome(string $nama_kategori, int $limit)
    {
        $statement = $this->conn->prepare(
            " SELECT nama_kelompok, nama_produk, harga, view_count, nama_kategori, k.id_kelompok, k.id_kategori, p.id_produk,
                        (SELECT url FROM foto f WHERE f.id_produk=p.id_produk AND f.is_primary=1) AS primary_foto
                        FROM kelompok k, produk p, kategori ka
                        WHERE k.id_kelompok=p.id_kelompok AND k.id_kategori=ka.id_kategori AND nama_kategori=:kategori
                        ORDER BY view_count DESC LIMIT :limit"
        );


        $limit1 = (int)$limit;
        $statement->bindParam("kategori", $nama_kategori);
        $statement->bindParam("limit", $limit1, \PDO::PARAM_INT);
        $statement->execute();
        //        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function SelectForDetail(string $id_produk)
    {
        $statement = $this->conn->prepare(
            "SELECT k.nama_kelompok, k.url_logo_toko, p.id_kelompok, angkatan, nama_produk, harga, view_count, deskripsi_produk, 
                    (SELECT COUNT(*) FROM produk, kelompok 
                    WHERE produk.id_kelompok=kelompok.id_kelompok AND kelompok.id_kelompok=p.id_kelompok) AS total_produk 
                    FROM kelompok k, produk p 
                    WHERE k.id_kelompok=p.id_kelompok AND p.id_produk=?"
        );

        $statement->execute([$id_produk]);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function SelectForDetailToko(string $id_kelompok)
    {
        $statement = $this->conn->prepare(
            "SELECT k.id_kelompok, nama_kelompok, angkatan, url_logo_toko, nama_kategori,
                (SELECT COUNT(*) FROM produk, kelompok WHERE produk.id_kelompok=kelompok.id_kelompok AND kelompok.id_kelompok=p.id_kelompok) AS total_produk
            FROM kelompok k, produk p, kategori ka
            WHERE k.id_kelompok=p.id_kelompok AND k.id_kategori=ka.id_kategori AND k.id_kelompok=?
            LIMIT 1"
        );

        $statement->execute([$id_kelompok]);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function SelectForDetailTokoMember(string $id_kelompok)
    {
        $statement = $this->conn->prepare(
            "SELECT k.id_kelompok, d.nama_penjual
            FROM kelompok k, detail_kelompok d
            WHERE k.id_kelompok=d.id_kelompok AND k.id_kelompok=?"
        );

        $statement->execute([$id_kelompok]);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function SelectForDetailTokoProducts(string $id_kelompok)
    {
        $statement = $this->conn->prepare(
            "SELECT id_produk, nama_kelompok, nama_produk, harga,
                (SELECT url FROM foto f WHERE f.id_produk=p.id_produk AND f.is_primary=1) AS primary_foto
            FROM kelompok k, produk p
            WHERE k.id_kelompok=p.id_kelompok AND k.id_kelompok=?"
        );

        $statement->execute([$id_kelompok]);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}

<?php

namespace app\Repository;

use app\DBModel\Banner;

class BannerRepository
{
    private \PDO $conn;

    /**
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }
    public function Insert(Banner $banner)
    {
        $statement = $this->conn->prepare(
            "INSERT INTO banner(url_banner, status, id_pengguna)
                    VALUES(?,1,?)"
        );

        $statement->execute([
            $banner->url_banner,
            $banner->id_pengguna
        ]);
    }

    public function Deactivate(string $id) : void
    {
        $statement = $this->conn->prepare("
            UPDATE banner SET 
               status = 0
               WHERE id = ?
            ");
        $statement->execute([
            $id
        ]);
    }

    public function SelectAll()
    {
        $statement = $this->conn->prepare(
            "SELECT * FROM banner ORDER BY status DESC"
        );

        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function SelectAcive()
    {
        $statement = $this->conn->prepare(
            "SELECT * FROM banner WHERE status = 1"
        );

        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}
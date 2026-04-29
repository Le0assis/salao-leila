<?php

namespace App\Models;

use PDO;

Class Services {

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO service
            (name, description, duration, price, active)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['name'],
            $data['description'],
            $data['duration'],
            $data['price'],
            $data['active']
        ]);
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM services WHERE active=1");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM services WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update(int $id, array $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE service
            SET name = ?, description = ?, duration = ?, price = ?, active=?
            WHERE id = ?
        ");

        $stmt->execute([
            $data['name'],
            $data['description'],
            $data['duration'],
            $data['price'],
            $data['active'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM services WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
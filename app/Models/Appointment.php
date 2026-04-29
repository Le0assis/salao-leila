<?php

namespace App\Models;

class Appointment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO appointments 
            (user_id, scheduled_at, status, confirmed, notes)
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['user_id'],
            $data['scheduled_at'],
            $data['status'],
            $data['confirmed'],
            $data['notes']
        ]);
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM appointments");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM appointment WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE appointment
            SET user_id = ?, scheduled_at = ?, status = ?, confirmed = ?, notes = ?
            WHERE id = ?
        ");

        $stmt->execute([
            $data['user_id'],
            $data['scheduled_at'],
            $data['status'],
            $data['confirmed'],
            $data['notes'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM appointment WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
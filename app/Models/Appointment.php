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
            (user_id, scheduled_at,notes)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([
            1,
            $data['scheduled_at'],
            $data['notes']
        ]);

        $appointmentId = $this->pdo->lastInsertId();

        return $appointmentId;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM appointments");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM appointments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getByService($appointmentId)
    {
        $stmt = $this->pdo->prepare("
        SELECT s.*
        FROM services s
        INNER JOIN appointment_services aps ON aps.service_id = s.id
        WHERE aps.appointment_id = ?
    ");

        $stmt->execute([$appointmentId]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE appointments
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
        $stmt = $this->pdo->prepare("DELETE FROM appointments WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getByPeriod($start, $end)
{
    $stmt = $this->pdo->prepare("
        SELECT * FROM appointments
        WHERE scheduled_at BETWEEN ? AND ?
        ORDER BY scheduled_at DESC
    ");

    $stmt->execute([$start, $end]);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}


}
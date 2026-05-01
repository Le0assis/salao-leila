<?php

namespace App\Models;

use PDO;

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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM appointments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getThisWeek()
    {
        $stmt = $this->pdo->prepare("
        SELECT * FROM appointments
        WHERE YEARWEEK(scheduled_at, 1) = YEARWEEK(CURDATE(), 1)
    ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getThisMonth()
    {
        $stmt = $this->pdo->prepare("
        SELECT * FROM appointments
        WHERE MONTH(scheduled_at) = MONTH(CURDATE())
        AND YEAR(scheduled_at) = YEAR(CURDATE())
    ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByUserAndWeek($userId, $date)
    {
        $stmt = $this->pdo->prepare("
        SELECT * FROM appointments
        WHERE user_id = ?
        AND YEARWEEK(scheduled_at, 1) = YEARWEEK(?, 1)
        LIMIT 1
    ");

        $stmt->execute([$userId, $date]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
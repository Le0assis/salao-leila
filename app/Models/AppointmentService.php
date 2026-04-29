<?php

namespace App\Models;

class AppointmentService
{

    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function attachService($appointmentId, $serviceId, $status = 'Pendente')
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO appointment_services 
            (appointment_id, service_id, service_status)
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([$appointmentId, $serviceId, $status]);

    }

    public function getServiceByAppointment($appointmentID)
    {
        $stmt = $this->pdo->prepare("
            SELECT s.*, aps.service_status
            FROM appointment_services aps
            INNER JOIN services s ON aps.service_id = s.id
            WHERE aps.appointment_id = ?
        ");

        $stmt->execute([$appointmentID]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
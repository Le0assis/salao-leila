<?php

namespace App\Controllers;

use PDO;

class AdminController
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $totalClients = $this->countClients();
        $totalServices = $this->countServices();
        $totalAppointments = $this->countAppointments();
        $pendingAppointments = $this->countPendingAppointments();

        $view = __DIR__ . '/../Views/admin/dashboard.php';

        require __DIR__ . '/../Views/layouts/admin.php';
    }

    private function countClients()
    {
        return $this->pdo
            ->query("SELECT COUNT(*) FROM users")
            ->fetchColumn();
    }

    private function countServices()
    {
        return $this->pdo
            ->query("SELECT COUNT(*) FROM services")
            ->fetchColumn();
    }

    private function countAppointments()
    {
        return $this->pdo
            ->query("SELECT COUNT(*) FROM appointments")
            ->fetchColumn();
    }

    private function countPendingAppointments()
    {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(*) FROM appointments WHERE status = ?"
        );

        $stmt->execute(['pendente']);

        return $stmt->fetchColumn();
    }
}
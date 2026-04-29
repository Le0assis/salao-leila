<?php

namespace App\Controllers;

use App\Services\AppointmentManager;
use App\Models\Appointment;
use App\Models\AppointmentService;
use Exception;

class AppointmentController
{
    private AppointmentManager $manager;
 

    public function __construct($pdo)
    {
        $appointmentModel = new Appointment($pdo);
        $appointmentServiceModel = new AppointmentService($pdo);

        $this->manager = new AppointmentManager(
            $appointmentModel,
            $appointmentServiceModel
        );
    }

    public function index()
    {
        $appointments = $this->manager->listAppointments();

        require __DIR__ . '/../Views/appointments/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../Views/appointments/create.php';
    }

    public function store()
    {
        try {
            $data = $_POST;
            $services = $_POST['services'] ?? [];

            $this->manager->createAppointment($data, $services);

            header("Location: /appointments");
            exit;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function edit($id)
    {
        $appointment = $this->manager->getAppointmentById($id);

        require __DIR__ . '/../Views/appointments/edit.php';
    }

    public function update($id)
    {
        try {
            $this->manager->updateAppointment($id, $_POST);

            header("Location: /appointments");
            exit;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $this->manager->deleteAppointment($id);

        header("Location: /appointments");
        exit;
    }
}
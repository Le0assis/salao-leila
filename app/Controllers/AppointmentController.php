<?php

namespace App\Controllers;

use App\Services\AppointmentManager;
use App\Models\Appointment;
use App\Models\AppointmentService;
use App\Models\Services;
use Exception;

class AppointmentController
{
    private AppointmentManager $manager;


    public function __construct($pdo)
    {

        $appointmentModel = new Appointment($pdo);
        $appointmentServiceModel = new AppointmentService($pdo);
        $service = new Services($pdo);

        $this->manager = new AppointmentManager(
            $appointmentModel,
            $appointmentServiceModel,
            $service
        );
    }

    #Pagina inicial
    public function index()
    {
        $appointments = $this->manager->listAppointments();

        foreach ($appointments as &$appointment) {
            $appointment['services'] =
                $this->manager->getByService($appointment['id']);
        }

        require __DIR__ . '/../Views/Appointments/index.php';
    }
    #Entra na tela de croiacao de agendamento
    public function create()
    {
        $services = $this->manager->listServices();

        require __DIR__ . '/../Views/Appointments/create.php';
    }
    #Salva o agendamento no banco
    public function store()
    {
        try {

            $data = $_POST;
            $services = $_POST['services'] ?? [];

            $this->manager->createAppointment($data, $services);

            header("Location: /salao-leila/public/appointments");
            exit;

        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    #Puxa o agendamento para ser editado
    public function edit($id)
    {
        if (!$this->manager->canEditAppointment($id)) {
            die("Alteração permitida apenas por telefone.");
        }
        $appointment = $this->manager->getAppointmentById($id);

        require __DIR__ . '/../Views/Appointments/edit.php';
    }
    #Salva as alteracoes no banco
    public function update($id)
    {
        try {
            $this->manager->updateAppointment($id, $_POST);

            self::index();

        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    #Deleta o agendamento
    public function destroy($id)
    {
        $this->manager->deleteAppointment($id);

        header("Location: /appointments");
        exit;
    }
    #Historico de agendamento
    public function history()
    {
        $start = $_GET['start'] ?? null;
        $end = $_GET['end'] ?? null;

        $appointments = [];

        if ($start && $end) {
            $appointments = $this->manager->getByPeriod($start, $end);
        }

        require __DIR__ . '/../Views/Appointments/history.php';
    }

}
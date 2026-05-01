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

        $title = "Agendamentos";
        $view = __DIR__ . '/../Views/appointments/index.php';

        require __DIR__ . '/../Views/layouts/admin.php';

    }
    #Entra na tela de croiacao de agendamento
    public function create()
    {
        $services = $this->manager->listServices();

        $view = __DIR__ . '/../Views/Appointments/create.php';

        require __DIR__ . '/../Views/layouts/admin.php';
    }
    #Salva o agendamento no banco
    public function store()
    {
        $userId = $_POST['user_id'];
        $date = $_POST['scheduled_at'];

        $existing = $this->manager->checkWeekly($userId, $date);

        $message = null;

        if ($existing) {
            $message = "Agendamento realizado com sucesso. Observação: você já possuía um agendamento nesta mesma semana."
                . date('d/m/Y H:i', strtotime($existing['scheduled_at']));
        }

        $data = $_POST;
        $services = $_POST['services'] ?? [];

        $this->manager->createAppointment($data, $services);

        if ($message) {
            header("Location: /salao-leila/public/appointments?msg=" . urlencode($message));
        } else {
            header("Location: /salao-leila/public/appointments");
        }

        exit;

    }
    #Puxa o agendamento para ser editado
    public function edit($id)
    {
        if (!$this->manager->canEditAppointment($id)) {
            $_SESSION['error'] = "Alterações com menos de 2 dias devem ser feitas por telefone.";
            header("Location: /salao-leila/public/appointments");
            exit;
        }
        $appointment = $this->manager->getAppointmentById($id);

        $view = __DIR__ . '/../Views/Appointments/edit.php';
        
        require __DIR__ . '/../Views/layouts/admin.php';
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

    public function show($id)
    {
        $appointment = $this->manager->getAppointmentById($id);

        $view = __DIR__ . '/../Views/Appointments/show.php';

        require __DIR__ . '/../Views/layouts/admin.php';
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

        foreach ($appointments as &$appointment) {
            $appointment['services'] =
                $this->manager->getByService($appointment['id']);
        }

        $view = __DIR__ . '/../Views/Appointments/index.php';

        require __DIR__ . '/../Views/layouts/admin.php';
    }
    public function historyWeek()
    {
        $appointments = $this->manager->getThisWeek();

        foreach ($appointments as &$appointment) {
            $appointment['services'] =
                $this->manager->getByService($appointment['id']);
        }

        $view = __DIR__ . '/../Views/Appointments/index.php';

        require __DIR__ . '/../Views/layouts/admin.php';
    }
    public function historyMonth()
    {
        $appointments = $this->manager->getThisMonth();

        foreach ($appointments as &$appointment) {
            $appointment['services'] =
                $this->manager->getByService($appointment['id']);
        }
        $view = __DIR__ . '/../Views/Appointments/index.php';

        require __DIR__ . '/../Views/layouts/admin.php';
    }

}
<?php

namespace App\Services;

use App\Models\Services;
use App\Models\Appointment;
use App\Models\AppointmentService;

use \Exception;

class AppointmentManager
{

    private Appointment $appointmentModel;
    private AppointmentService $appointmentServiceModel;
    private Services $services;

    public function __construct(
        Appointment $appointmentModel,
        AppointmentService $appointmentServiceModel,
        Services $services
    ) {
        $this->appointmentModel = $appointmentModel;
        $this->appointmentServiceModel = $appointmentServiceModel;
        $this->services = $services;
    }
    public function listServices()
    {
        return $this->services->getAll();
    }
    public function createAppointment($data, $services)
    {
        $appointmentId = $this->appointmentModel->create($data);

        foreach ($services as $serviceId) {
            $this->appointmentServiceModel->attachService($appointmentId, $serviceId);
        }

    }
    #Verifica se expiro o tempo de edicao do agendamento
    public function canEditAppointment($appointmentId)
    {
        $appointment = $this->appointmentModel->getById($appointmentId);

        if (!$appointment) {
            throw new Exception("Agendamento não encontrado.");
        }

        $scheduledDate = new \DateTime($appointment['scheduled_at']);
        $today = new \DateTime();

        $difference = $today->diff($scheduledDate);

        return $difference->days >= 2 && $scheduledDate > $today;
    }

    public function updateAppointment($id, $data)
    {
        if (!$this->canEditAppointment($id)) {
            throw new Exception("Não pode editar com menos de 2 dias de diferença");
        }

        return $this->appointmentModel->update($id, $data);
    }

    public function listAppointments()
    {
        return $this->appointmentModel->getAll();
    }

    public function getAppointmentById($id)
    {
        $appointment = $this->appointmentModel->getById($id);

        if (!$appointment) {
            throw new Exception("Agendamento não encontrado.");
        }

        return $appointment;
    }

    public function deleteAppointment($id)
    {
        $result = $this->appointmentModel->delete($id);

        if (!$result) {
            throw new Exception("Falha ao deletar.");
        }

        return true;
    }

    public function getByService($id)
    {
        $appointments = $this->appointmentModel->getByService($id);

        return $appointments;
    }

    public function getByPeriod($start, $end)
    {
        return $this->appointmentModel->getByPeriod($start, $end);
    }
    public function getThisWeek()
    {
        return $this->appointmentModel->getThisWeek();
    }

    public function getThisMonth()
    {
        return $this->appointmentModel->getThisMonth();
    }

    public function checkWeekly($userId, $date)
    {
        return $this->appointmentModel->findByUserAndWeek($userId, $date);
    }


}
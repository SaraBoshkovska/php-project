<?php
include_once __DIR__ . '/../model/ServiceModel.php';
include_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/AppointmentModel.php';
include_once __DIR__ . '/../config/db.php';

class AppointmentController
{
    private AppointmentModel $appointmentModel;

    public function __construct(AppointmentModel $appointmentModel)
    {
        $this->appointmentModel = $appointmentModel;
    }

    public function showAllAppointments()
    {
        session_start();
        $appointments = $this->appointmentModel->getAllAppointments();

        include __DIR__ . '/../view/appointments/appointments.php';
    }

    public function create()
    {
        $db = Database::get_db();
        $serviceModel = new ServiceModel($db); // Instantiate the service model
        $services = $serviceModel->getAllServices(); // Fetch all services
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            $serviceId = $_POST['service_id'];
            $appointmentDate = $_POST['appointment_date'];
            $appointmentTime = $_POST['appointment_time'];
    
            if ($this->appointmentModel->isTimeSlotAvailable($serviceId, $appointmentDate, $appointmentTime)) {
                $this->appointmentModel->createAppointment($userId, $serviceId, $appointmentDate, $appointmentTime);
                header('Location: appointments.php');
            } else {
                $error = "The selected time slot is not available. Please choose another time.";
            }
        }
            include './view/appointments/create_appointment.php';
    }

    
    public function cancel($appointmentId)
    {
        $this->appointmentModel->cancelAppointment($appointmentId);
        header('Location: appointments.php');
    }
}
?>

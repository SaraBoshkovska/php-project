<?php
include_once __DIR__ . '/../config/db.php';

class AppointmentModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
public function isTimeSlotAvailable($serviceId, $appointmentDate, $appointmentTime)
{
    $query = "
        SELECT COUNT(*) as count 
        FROM appointments 
        WHERE service_id = :service_id 
          AND appointment_date = :appointment_date 
          AND appointment_time = :appointment_time
    ";
    $stmt = $this->db->prepare($query);
    $stmt->execute([
        'service_id' => $serviceId,
        'appointment_date' => $appointmentDate,
        'appointment_time' => $appointmentTime,
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['count'] == 0; // Return true if slot is available
}

public function getAllAppointments()
{
    $query = "
        SELECT a.id AS appointment_id, u.name AS user_name, 
               a.appointment_date, a.appointment_time, a.status 
        FROM appointments a
        JOIN users u ON a.user_id = u.userID
    ";
    $stmt = $this->db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function getAppointmentsByUserId($userId)
{
    $query = "
        SELECT 
            a.id AS appointment_id, 
            s.service_name, 
            u.name AS user_name, 
            a.appointment_date, 
            a.appointment_time, 
            a.status
        FROM appointments a
        JOIN services s ON a.service_id = s.id
        JOIN users u ON a.user_id = u.userID
        WHERE a.user_id = :user_id
    ";
    $stmt = $this->db->prepare($query);
    $stmt->execute(['user_id' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function createAppointment($userId, $serviceId, $appointmentDate, $appointmentTime)
    {
        $query = "INSERT INTO appointments (user_id, service_id, appointment_date, appointment_time, status) 
                  VALUES (:user_id, :service_id, :appointment_date, :appointment_time, 'active')";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'user_id' => $userId,
            'service_id' => $serviceId,
            'appointment_date' => $appointmentDate,
            'appointment_time' => $appointmentTime,
        ]);
    }
    public function getAppointmentById($appointmentId)
    {
    $query = "SELECT * FROM appointments WHERE id = :appointment_id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(['appointment_id' => $appointmentId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cancelAppointment($appointmentId)
    {
        $query = "UPDATE appointments SET status = 'cancelled' WHERE id = :appointment_id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['appointment_id' => $appointmentId]);
    }
}
?>

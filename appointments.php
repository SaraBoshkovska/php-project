<?php

include __DIR__ . '/controller/AppointmentController.php';
require_once './model/AppointmentModel.php';
require_once './config/db.php';

$db = Database::get_db();
$appointmentModel = new AppointmentModel($db);
$controller = new AppointmentController($appointmentModel);
$controller->showAllAppointments();
?>

<?php
include_once './controller/AppointmentController.php';
require_once './model/AppointmentModel.php';
include_once './model/ServiceModel.php';
$db = Database::get_db();
$appointmentModel = new AppointmentModel($db);
$controller = new AppointmentController($appointmentModel);
$controller->create();

?>
<?php

$title="Appointments";
include __DIR__ . '/../../include/head.inc.php';
include __DIR__ . '/../../include/navigation.inc.php';

include_once __DIR__ . '/../../controller/AppointmentController.php';


if (!isset($appointments)) {
    $appointments = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @media only screen and (max-width:800px) {
            #no-more-tables tbody,
            #no-more-tables tr,
            #no-more-tables td {
                display: block;
            }
            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            #no-more-tables td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }
            #no-more-tables td:before {
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
            }
            #no-more-tables tr {
                border-bottom: 1px solid #ccc;
            }
        }
    </style>
</head>
<body>
    <section class="bg-light p-5">
<h3 class="pb-2">All Appointments</h3>
<div class="table-responsive" id="no-more-tables">
<table class="table bg-white">
    <thead class="bg-dark text-light">
    <tr>
        <th>User Name</th>
        <th>Appointment Date</th>
        <th>Appointment Time</th>
      
    </tr>
    </thead>
    <tbody>
    <?php foreach ($appointments as $appointment): ?>
        <tr>
            <td><?= htmlspecialchars($appointment['user_name']); ?></td>
            <td><?= htmlspecialchars($appointment['appointment_date']); ?></td>
            <td><?= htmlspecialchars($appointment['appointment_time']); ?></td>
            
        </tr>
    <?php endforeach; ?>
    </tbody>
      </table>
    </div>
</section>
</body>
</html>


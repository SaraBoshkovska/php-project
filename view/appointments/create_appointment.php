<?php
  session_start();
$title="Schedule";
   include __DIR__ . '/../../include/head.inc.php';
   include __DIR__ . '/../../include/navigation.inc.php';
   include_once __DIR__ . '/../../config/db.php';
   include_once __DIR__ . '/../../controller/AppointmentController.php';
   require_once __DIR__ . '/../../model/AppointmentModel.php';
   include_once __DIR__ . '/../../model/ServiceModel.php';


   $userId = $_SESSION['userID'] ?? null;
   if (!$userId) {
       die('You must be logged in to book an appointment.');
   }
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: black;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-top: 3px;
    }

    form {
        background: #fff;
        max-width: 500px;
        margin: 30px auto;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    select {
        appearance: none;
        background: #fff url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5"><path fill="none" stroke="%23666" stroke-width="1" d="M2 0L0 2h4z"/></svg>') no-repeat right 10px center;
        background-size: 8px 10px;
    }

    button {
        display: block;
        width: 100%;
        background-color: #007bff;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    p {
        font-size: 14px;
        color: #dc3545;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
</style>

<div class="container">
    <form method="post" action="/../../php-project/create_appointment.php">
        <h1>Schedule an Appointment</h1>

        <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId); ?>">

        <label for="service_id">Choose a Service:</label>
        <select id="service_id" name="service_id" required>
            <?php
            $services = Database::get_db()->query("SELECT id, service_name FROM services")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($services as $service) {
                echo "<option value='{$service['id']}'>{$service['service_name']}</option>";
            }
            ?>
        </select>

        <label for="appointment_date">Date:</label>
        <input type="date" name="appointment_date" id="appointment_date" required>

        <label for="appointment_time">Time:</label>
        <select name="appointment_time" id="appointment_time" required>
            <?php for ($hour = 9; $hour <= 17; $hour++): ?>
                <option value="<?= sprintf('%02d:00:00', $hour); ?>"><?= sprintf('%02d:00', $hour); ?></option>
            <?php endfor; ?>
        </select>

        <?php if (!empty($error)): ?>
            <p><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <button type="submit">Book Appointment</button>
    </form>
</div>


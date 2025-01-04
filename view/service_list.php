<?php
  $title="Services";
  include './include/navigation.inc.php';
  include './include/head.inc.php';
  include './controller/UserController.php';
  
  $is_logged_in = isset($_SESSION['userID']);
  $user_role = $_SESSION['role'] ?? 'Customer';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .m {
            color: silver;
        }
        body {
            color: white;
            background-color: black;
        }
        .card-img-top {
            height: 270px;
        }
        .card {
            max-width: 350px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Available Services</h1>
       <?php if ($is_logged_in && $user_role=='Admin'): ?>
        <a href="service_router.php?action=add" class="btn btn-success mb-4">Add Service</a>
        <?php endif; ?>
        <?php
        $categories = [];
        foreach ($services as $service) {
            $categories[$service->getCategory()][] = $service;
        }

        foreach ($categories as $category => $servicesInCategory):
        ?>
            <h2 class="m"><?= htmlspecialchars($category) ?></h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($servicesInCategory as $service): ?>
                    <div class="col">
                        <div class="card h-100">
                            <?php if (!empty($service->getImage())): ?>
                                <img src="<?= htmlspecialchars($service->getImage()) ?>" class="card-img-top" alt="Service Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($service->getName()) ?></h5>
                                <p class="card-text">
                                    <strong>Description:</strong> <?= htmlspecialchars($service->getDescription()) ?><br>
                                    <strong>Price:</strong> $<?= htmlspecialchars($service->getPrice()) ?><br>
                                    <strong>Duration:</strong> <?= htmlspecialchars($service->getDuration()) ?> minutes
                                </p>
                            </div>
                            <?php if ($is_logged_in && $user_role=='Admin'): ?>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="service_router.php?action=edit&id=<?= $service->getId() ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="service_router.php?action=delete&id=<?= $service->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <hr class="my-4">
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


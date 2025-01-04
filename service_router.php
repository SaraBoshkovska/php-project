<?php
session_start();
include_once 'config/db.php';
require './model/ServiceModel.php';
require './controller/ServiceController.php';

$db = Database::get_db();

$model = new ServiceModel($db);
$controller = new ServiceController($model);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action === 'add') {
    $controller->addService();
} elseif ($action === 'edit' && $id) {
    $controller->editService($id);
} elseif ($action === 'delete' && $id) {
    $controller->deleteService($id);
} else {
    $controller->index();
}

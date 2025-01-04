<?php
require_once __DIR__ . '/../../php-project/config/db.php';
require_once __DIR__ . '/../../php-project/model/ServiceModel.php'; 

class ServiceController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $services = $this->model->getAllServices();
        include 'view/service_list.php';
    }

    public function addService()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new Service([
                'service_name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'duration_minutes' => $_POST['duration_minutes'],
                'image' => $this->uploadImage($_FILES['image']),
                'category' => $_POST['category']
            ]);
            $this->model->addService($service);
            header("Location: index.php");
        } else {
            include 'view/add_service.php';
        }
    }

    public function deleteService($id)
    {
        $this->model->deleteService($id);
        header("Location: index.php");
    }

    public function editService($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new Service([
                'id' => $id,
                'service_name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'duration_minutes' => $_POST['duration_minutes'],
                'image' => $this->uploadImage($_FILES['image']),
                'category' => $_POST['category']
            ]);
            $this->model->updateService($service);
            header("Location: index.php");
        } else {
            $service = $this->model->getServiceById($id);
            include 'view/edit_service.php';
        }
    }

    private function uploadImage($file)
    {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $targetDir = "images/";
            $targetFile = $targetDir . basename($file['name']);
            move_uploaded_file($file['tmp_name'], $targetFile);
            return $targetFile;
        }
        return null;
    }
}



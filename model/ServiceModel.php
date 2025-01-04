<?php
include __DIR__ . '/../classes/Service.php';
class ServiceModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllServices()
    {
        $stmt =Database::get_db()->query("SELECT * FROM services");
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($data) => new Service($data), $services);
    }

    public function getServiceById($id)
    {
        $stmt =Database::get_db()->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new Service($data) : null;
    }

    public function addService(Service $service)
    {
        $stmt = Database::get_db()->prepare("INSERT INTO services (service_name, description, price, duration_minutes, image, category) 
                                    VALUES (:service_name, :description, :price, :duration_minutes, :image, :category)");
        return $stmt->execute([
            'service_name' => $service->getName(),
            'description' => $service->getDescription(),
            'price' => $service->getPrice(),
            'duration_minutes' => $service->getDuration(),
            'image' => $service->getImage(),
            'category' => $service->getCategory()
        ]);
    }

    public function updateService(Service $service)
    {
        $stmt = Database::get_db()->prepare("UPDATE services SET service_name = :service_name, description = :description, 
                                    price = :price, duration_minutes = :duration_minutes, image = :image, category = :category
                                    WHERE id = :id");
        return $stmt->execute([
            'id' => $service->getId(),
            'service_name' => $service->getName(),
            'description' => $service->getDescription(),
            'price' => $service->getPrice(),
            'duration_minutes' => $service->getDuration(),
            'image' => $service->getImage(),
            'category' => $service->getCategory()
        ]);
    }

    public function deleteService($id)
    {
        $stmt = Database::get_db()->prepare("DELETE FROM services WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>

<?php
class Service
{
    private $id;
    private $service_name;
    private $description;
    private $price;
    private $duration_minutes;
    private $image;
    private $category;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->service_name = $data['service_name'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->duration_minutes = $data['duration_minutes'];
        $this->image = $data['image'];
        $this->category = $data['category'];
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->service_name; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getDuration() { return $this->duration_minutes; }
    public function getImage() { return $this->image; }
    public function getCategory() { return $this->category; }
}

<?php

namespace App\Controllers;

use App\Models\Services;
use PDO;

class ServiceController
{
    private Services $serviceModel;

    public function __construct(PDO $pdo)
    {
        $this->serviceModel = new Services($pdo);
    }

    public function index()
    {
        $services = $this->serviceModel->getAll();

        require __DIR__ . '/../Views/services/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../Views/Services/create.php';
    }

    public function store()
    {
        $data = $_POST;

        $this->serviceModel->create($data);

        require __DIR__ . '/../Views/services/index.php';
    } 
}
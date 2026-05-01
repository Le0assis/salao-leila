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

        $title = "Serviços";

        $view = __DIR__ . '/../Views/services/index.php';

        require __DIR__ . '/../Views/layouts/admin.php';
    }

    public function create()
    {


        $view = __DIR__ . '/../Views/services/create.php';

        require __DIR__ . '/../Views/layouts/admin.php';

    }

    public function store()
    {
        $data = $_POST;

        $this->serviceModel->create($data);

        $_SESSION['success'] = "Serviço criado com sucesso!";
        header("Location: /salao-leila/public/services");
        
        exit;
    }
}
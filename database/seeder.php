<?php

require_once __DIR__ . '/init_db.php';

echo "Iniciando seed grande...\n";

/* =========================
   USERS (50 usuários)
========================= */
$stmt = $pdo->prepare("
    INSERT INTO users (name, email)
    VALUES (:name, :email)
");

for ($i = 1; $i <= 50; $i++) {
    $stmt->execute([
        'name' => "Cliente $i",
        'email' => "cliente$i@email.com"
    ]);
}

echo "50 users inseridos!\n";


/* =========================
   SERVICES (10 serviços)
========================= */
$stmt = $pdo->prepare("
    INSERT INTO services (name, description, duration, price, active)
    VALUES (:name, :description, :duration, :price, :active)
");

$servicesList = [
    ['Corte masculino', 30, 25],
    ['Corte feminino', 45, 40],
    ['Barba', 20, 15],
    ['Sobrancelha', 15, 10],
    ['Progressiva', 120, 120],
    ['Hidratação', 40, 35],
    ['Luzes', 90, 100],
    ['Coloração', 80, 90],
    ['Escova', 30, 20],
    ['Penteado', 60, 70],
];

foreach ($servicesList as $s) {
    $stmt->execute([
        'name' => $s[0],
        'description' => "Serviço de {$s[0]}",
        'duration' => $s[1],
        'price' => $s[2],
        'active' => 1
    ]);
}

echo "10 services inseridos!\n";


/* =========================
   APPOINTMENTS (200 agendamentos)
========================= */
$stmt = $pdo->prepare("
    INSERT INTO appointments (user_id, scheduled_at, status, confirmed, notes)
    VALUES (:user_id, :scheduled_at, :status, :confirmed, :notes)
");

$statusList = ['Agendado', 'Concluído', 'Cancelado'];

for ($i = 1; $i <= 200; $i++) {

    $date = date('Y-m-d H:i:s', strtotime(rand(-30, 30) . ' days ' . rand(8, 18) . ':00'));

    $stmt->execute([
        'user_id' => rand(1, 50),
        'scheduled_at' => $date,
        'status' => $statusList[array_rand($statusList)],
        'confirmed' => rand(0, 1),
        'notes' => 'Gerado automaticamente'
    ]);
}

echo "200 appointments inseridos!\n";


/* =========================
   APPOINTMENT SERVICES (1 a 3 serviços por agendamento)
========================= */
$stmt = $pdo->prepare("
    INSERT INTO appointment_services (appointment_id, service_id, service_status)
    VALUES (:appointment_id, :service_id, :service_status)
");

for ($i = 1; $i <= 200; $i++) {

    $qtd = rand(1, 3);

    for ($j = 0; $j < $qtd; $j++) {
        $stmt->execute([
            'appointment_id' => $i,
            'service_id' => rand(1, 10),
            'service_status' => 'Agendado'
        ]);
    }
}

echo "Appointment services inseridos!\n";

echo "Seed grande finalizado com sucesso!\n";
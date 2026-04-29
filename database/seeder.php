<?php

require_once __DIR__ . '/init_db.php'; // deve retornar o PDO

echo "Iniciando seed...\n";

/* =========================
   USERS
========================= */
$stmt = $pdo->prepare("
    INSERT INTO users (name, email)
    VALUES (:name, :email)
");

$users = [
    ['name' => 'Maria Silva', 'email' => 'maria@email.com'],
    ['name' => 'João Souza', 'email' => 'joao@email.com'],
    ['name' => 'Ana Costa', 'email' => 'ana@email.com'],
];

foreach ($users as $u) {
    $stmt->execute($u);
}

echo "Users inseridos!\n";


/* =========================
   SERVICES
========================= */
$stmt = $pdo->prepare("
    INSERT INTO services (name, description, duration, price, active)
    VALUES (:name, :description, :duration, :price, :active)
");

$services = [
    [
        'name' => 'Corte de cabelo',
        'description' => 'Corte masculino ou feminino',
        'duration' => 30,
        'price' => 25.00,
        'active' => 1
    ],
    [
        'name' => 'Barba',
        'description' => 'Aparar e modelar barba',
        'duration' => 20,
        'price' => 15.00,
        'active' => 1
    ],
    [
        'name' => 'Sobrancelha',
        'description' => 'Design de sobrancelha',
        'duration' => 15,
        'price' => 10.00,
        'active' => 1
    ],
];

foreach ($services as $s) {
    $stmt->execute($s);
}

echo "Services inseridos!\n";


/* =========================
   APPOINTMENTS
========================= */
$stmt = $pdo->prepare("
    INSERT INTO appointments (user_id, scheduled_at, status, confirmed, notes)
    VALUES (:user_id, :scheduled_at, :status, :confirmed, :notes)
");

$appointments = [
    [
        'user_id' => 1,
        'scheduled_at' => date('Y-m-d H:i:s', strtotime('+1 day')),
        'status' => 'Agendado',
        'confirmed' => 1,
        'notes' => 'Primeiro atendimento'
    ],
    [
        'user_id' => 2,
        'scheduled_at' => date('Y-m-d H:i:s', strtotime('+2 days')),
        'status' => 'Agendado',
        'confirmed' => 0,
        'notes' => 'Cliente novo'
    ],
];

foreach ($appointments as $a) {
    $stmt->execute($a);
}

echo "Appointments inseridos!\n";


/* =========================
   APPOINTMENT SERVICES
========================= */
$stmt = $pdo->prepare("
    INSERT INTO appointment_services (appointment_id, service_id, service_status)
    VALUES (:appointment_id, :service_id, :service_status)
");

$appointmentServices = [
    [
        'appointment_id' => 1,
        'service_id' => 1,
        'service_status' => 'Agendado'
    ],
    [
        'appointment_id' => 1,
        'service_id' => 2,
        'service_status' => 'Agendado'
    ],
    [
        'appointment_id' => 2,
        'service_id' => 3,
        'service_status' => 'Agendado'
    ],
];

foreach ($appointmentServices as $as) {
    $stmt->execute($as);
}

echo "Appointment services inseridos!\n";

echo "Seed finalizado com sucesso!\n";
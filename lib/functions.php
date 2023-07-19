<?php

function get_connection() {
    $config = require 'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function get_careplans($limit = null) {

    $pdo = get_connection();

    $query = 'SELECT * FROM care_plans';
    if ($limit) {
        $query = $query.' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    if ($limit) {
        $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT); //added this line new
    }
    $stmt->execute();  //added this line new
    $care_plans = $stmt->fetchAll();

    return $carePlans;
}

function get_contacts($limit = null) {

    $pdo = get_connection();

    $query = 'SELECT * FROM contacts';
    if ($limit) {
        $query = $query.' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    if ($limit) {
        $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT); //added this line new
    }
    $stmt->execute();  //added this line new
    $contacts = $stmt->fetchAll();

    return $contacts;
}

function get_careplan($id) {

    $pdo = get_connection();

    $query = 'SELECT * FROM care_plans WHERE id = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id);
    $stmt->execute();
    return $stmt->fetch();
}
function get_contact($id) {

    $pdo = get_connection();

    $query = 'SELECT * FROM contacts WHERE id = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id);
    $stmt->execute();
    return $stmt->fetch();
}

function save_careplans ($carePlanToSave) {
    $pdo = get_connection();

    $carePlanDate = $carePlanToSave['carePlanDate'];
    $carePlanTime = $carePlanToSave['carePlanTime'];
    $carePlanType = $carePlanToSave['carePlanType'];
    $carePlanWith = $carePlanToSave['carePlanWith'];
    $carePlanNotes = $carePlanToSave['carePlanNotes'];

    $query = 'INSERT INTO care_plans (visit_date, visit_time, type, visit_with, notes) VALUES (?,?,?,?,?)';
    //$query = 'INSERT INTO visits (name, breed, weight, bio, image) VALUES ("namer", "breader", 99, "", "", "");'
    $stmt = $pdo->prepare($query);
    $stmt->execute([$carePlanDate, $carePlanTime, $carePlanType,$carePlanWith,$carePlanNotes]);
    //$stmt = $pdo->prepare($query);
    //$stmt->execute();
    return $carePlanType." added";
}

function save_contact ($contactToSave) {
    $pdo = get_connection();

    $contactFirstN = $contactToSave['firstName'];
    $contactLastN = $contactToSave['lastName'];
    $contactType = $contactToSave['contactType'];
    $contactCompany = $contactToSave['companyPractice'];
    $contactEmail = $contactToSave['contactEmail'];
    $contactPhone = $contactToSave['contactPhone'];

    $query = 'INSERT INTO contacts (last_name, first_name, contact_type, company_practice, email, phone) VALUES (?,?,?,?,?,?)';
    //$query = 'INSERT INTO visits (name, breed, weight, bio, image) VALUES ("namer", "breader", 99, "", "", "");'
    $stmt = $pdo->prepare($query);
    $stmt->execute([$contactLastN, $contactFirstN, $contactType, $contactCompany, $contactEmail, $contactPhone]);
    //$stmt = $pdo->prepare($query);
    //$stmt->execute();
    return $contactCompany." added";
}
function update_careplans($carePlanToSave, $id) {
    $pdo = get_connection();

    $carePlanDate = $carePlanToSave['carePlanDate'];
    $carePlanTime = $carePlanToSave['carePlanTime'];
    $carePlanType = $carePlanToSave['carePlanType'];
    $carePlanWith = $carePlanToSave['carePlanWith'];
    $carePlanNotes = $carePlanToSave['carePlanNotes'];

    $query = 'UPDATE care_plans SET visit_date = ?, visit_time =?, type = ?, visit_with = ?, notes = ? WHERE id = ?';
    //$query = 'INSERT INTO visits (name, breed, weight, bio, image) VALUES ("namer", "breader", 99, "", "", "");'
    $stmt = $pdo->prepare($query);
    $stmt->execute([$carePlanDate, $carePlanTime, $carePlanType,$carePlanWith,$carePlanNotes,$id]);
    //$stmt = $pdo->prepare($query);
    //$stmt->execute();
    return $carePlanType." updated";
}
function update_contact ($contactToSave,$id) {
    $pdo = get_connection();

    $contactFirstN = $contactToSave['firstName'];
    $contactLastN = $contactToSave['lastName'];
    $contactType = $contactToSave['contactType'];
    $contactCompany = $contactToSave['companyPractice'];
    $contactEmail = $contactToSave['contactEmail'];
    $contactPhone = $contactToSave['contactPhone'];

    $query = 'UPDATE contacts SET last_name = ?, first_name = ?, contact_type = ?, company_practice =?, email = ?, phone = ? WHERE id = ?';
    //$query = 'INSERT INTO visits (name, breed, weight, bio, image) VALUES ("namer", "breader", 99, "", "", "");'
    $stmt = $pdo->prepare($query);
    $stmt->execute([$contactLastN, $contactFirstN, $contactType, $contactCompany, $contactEmail, $contactPhone, $id]);
    //$stmt = $pdo->prepare($query);
    //$stmt->execute();
    return $contactCompany." updated";
}

function delete_careplan($id) {
    $pdo = get_connection();

    $query = 'DELETE FROM care_plans WHERE id = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}

function delete_contact($id) {
    $pdo = get_connection();

    $query = 'DELETE FROM contacts WHERE id = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}
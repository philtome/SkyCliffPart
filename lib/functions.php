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

function get_visits($limit = null) {

    $pdo = get_connection();

    $query = 'SELECT * FROM visits';
    if ($limit) {
        $query = $query.' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    if ($limit) {
        $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT); //added this line new
    }
    $stmt->execute();  //added this line new
    $visits = $stmt->fetchAll();

    return $visits;
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

function get_visit($id) {

    $pdo = get_connection();

    $query = 'SELECT * FROM visits WHERE id = :idVal';
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

function save_visits ($visitToSave) {
    $pdo = get_connection();

    $visitDate = $visitToSave['visitDate'];
    $visitTime = $visitToSave['visitTime'];
    $visitType = $visitToSave['visitType'];
    $visitWith = $visitToSave['visitWith'];
    $visitNotes = $visitToSave['visitNotes'];

    $query = 'INSERT INTO visits (visit_date, visit_time, type, visit_with, notes) VALUES (?,?,?,?,?)';
    //$query = 'INSERT INTO visits (name, breed, weight, bio, image) VALUES ("namer", "breader", 99, "", "", "");'
    $stmt = $pdo->prepare($query);
    $stmt->execute([$visitDate, $visitTime, $visitType,$visitWith,$visitNotes]);
    //$stmt = $pdo->prepare($query);
    //$stmt->execute();
    return $visitType." added";
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
function update_visit($visitToSave, $id) {
    $pdo = get_connection();

    $visitDate = $visitToSave['visitDate'];
    $visitTime = $visitToSave['visitTime'];
    $visitType = $visitToSave['visitType'];
    $visitWith = $visitToSave['visitWith'];
    $visitNotes = $visitToSave['visitNotes'];

    $query = 'UPDATE visits SET visit_date = ?, visit_time =?, type = ?, visit_with = ?, notes = ? WHERE id = ?';
    //$query = 'INSERT INTO visits (name, breed, weight, bio, image) VALUES ("namer", "breader", 99, "", "", "");'
    $stmt = $pdo->prepare($query);
    $stmt->execute([$visitDate, $visitTime, $visitType,$visitWith,$visitNotes,$id]);
    //$stmt = $pdo->prepare($query);
    //$stmt->execute();
    return $visitType." updated";
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

function delete_visit($id) {
    $pdo = get_connection();

    $query = 'DELETE FROM visits WHERE id = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}

function delete_contact($id) {
    $pdo = get_connection();

    $query = 'DELETE FROM contacts WHERE id = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}
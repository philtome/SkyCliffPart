<?php require '../layout/header.php'; ?>

<?php

require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (isset($_POST['firstName'])) {
        $contactFirstN = $_POST['firstName'];
    } else {
        $contactFirstN = '';
    }

    if (isset($_POST['lastName'])) {
        $contactLastN = $_POST['lastName'];
    } else {
        $contactLastN = '';
    }

    if (isset($_POST['contactType'])) {
        $contactType = $_POST['contactType'];
    } else {
        $contactType = '';
    }

    if (isset($_POST['companyPractice'])) {
        $contactCompany = $_POST['companyPractice'];
    } else {
        $contactCompany = '';
    }

    if (isset($_POST['contactEmail'])) {
        $contactEmail = $_POST['contactEmail'];
    } else {
        $contactEmail= '';
    }

    if (isset($_POST['contactPhone'])) {
        $contactPhone = $_POST['contactPhone'];
    } else {
        $contactPhone= '';
    }

    if(isset($_POST['contactId'])) {
        $contactId = $_POST['contactId'];
    }

    $updateContact = array(
            'firstName' => $contactFirstN,
            'lastName' => $contactLastN,
            'contactType' => $contactType,
            'companyPractice' => $contactCompany,
            'contactEmail' => $contactEmail,
            'contactPhone' => $contactPhone,
        );
    //$pets[] = $newPet;
    if ($contactId == null) {
        $successful = save_contact($updateContact);
    }
    else {
        $successful = update_contact($updateContact, $contactId);
    }
    //$json = json_encode($pets, JSON_PRETTY_PRINT);
    //file_put_contents('data/pets.json', $json);

    header('Location: ../provider_display.php');
    die;
}
?>

<?php require 'layout/footer.php'; ?>


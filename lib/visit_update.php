<?php require '../layout/header.php'; ?>

<?php

require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (isset($_POST['visitDate'])) {
        $visitDate = $_POST['visitDate'];
    } else {
        $visitDate = '';
    }

    if (isset($_POST['visitTime'])) {
        $visitTime = $_POST['visitTime'];
    } else {
        $visitTime = '';
    }

    if (isset($_POST['visitType'])) {
        $visitType = $_POST['visitType'];
    } else {
        $visitType = '';
    }

    if (isset($_POST['visitWith'])) {
        $visitWith = $_POST['visitWith'];
    } else {
        $visitWith = '';
    }

    if (isset($_POST['visitNotes'])) {
        $visitNotes = $_POST['visitNotes'];
    } else {
        $visitNotes= '';
    }

    if(isset($_POST['visitId'])) {
        $visitId = $_POST['visitId'];
    }

    //$pets = get_pets();
    $newVisit = array(
            'visitDate' => $visitDate,
            'visitTime' => $visitTime,
            'visitType' => $visitType,
            'visitWith' => $visitWith,
            'visitNotes' => $visitNotes,
        );
    //$pets[] = $newPet;
    if ($visitId == null) {
        $successful = save_visits($newVisit);
    }
    else {
        $successful = update_visit($newVisit, $visitId);
    }
    //$json = json_encode($pets, JSON_PRETTY_PRINT);
    //file_put_contents('data/pets.json', $json);

    header('Location: ../visit_display.php');
    die;
}
?>

<?php require 'layout/footer.php'; ?>


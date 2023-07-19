<?php require '../layout/header.php'; ?>

<?php

require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (isset($_POST['carePlanDate'])) {
        $carePlanDate = $_POST['carePlanDate'];
    } else {
        $carePlanDate = '';
    }

    if (isset($_POST['carePlanTime'])) {
        $carePlanTime = $_POST['carePlanTime'];
    } else {
        $carePlanTime = '';
    }

    if (isset($_POST['carePlanType'])) {
        $carePlanType = $_POST['carePlanType'];
    } else {
        $carePlanType = '';
    }

    if (isset($_POST['carePlanWith'])) {
        $carePlanWith = $_POST['carePlanWith'];
    } else {
        $carePlanWith = '';
    }

    if (isset($_POST['carePlanNotes'])) {
        $carePlanNotes = $_POST['carePlanNotes'];
    } else {
        $carePlanNotes= '';
    }

    if(isset($_POST['carePlanId'])) {
        $carePlanId = $_POST['carePlanId'];
    }

    //$pets = get_pets();
    $newCarePlan = array(
            'carePlanDate' => $carePlanDate,
            'carePlanTime' => $carePlanTime,
            'carePlanType' => $carePlanType,
            'carePlanWith' => $carePlanWith,
            'carePlanNotes' => $carePlanNotes,
        );
    //$pets[] = $newPet;
    if ($carePlanId == null) {
        $successful = save_careplans($newCarePlan);
    }
    else {
        $successful = update_careplans($newCarePlan, $carePlanId);
    }
    //$json = json_encode($pets, JSON_PRETTY_PRINT);
    //file_put_contents('data/pets.json', $json);

    header('Location: ../visit_display.php');
    die;
}
?>

<?php require 'layout/footer.php'; ?>


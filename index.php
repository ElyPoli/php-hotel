<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Filtri
$parking_search = $_GET["parking"] ?? "show-both";
$vote_search = $_GET["vote"] ?? "1";
$filteredHotels = [];

// Itero su tutto l'array originale e aggiungo gli elementi che rispettano i filtri selezionati dall'utente al nuovo array
foreach ($hotels as $single_hotel) {

    // Filtro voto - verifico se il voto è maggiore o uguale a quello ricercato nel filtro 
    if (($single_hotel['vote'] >= $vote_search)) {

        // Filtro parcheggio - verifico quale voce di ricerca ha selezionato l'utente
        if (($parking_search == "with-parking") && ($single_hotel["parking"] == true)) {
            $filteredHotels[] = $single_hotel;
        } else if (($parking_search == "without-parking") && ($single_hotel["parking"] == false)) {
            $filteredHotels[] = $single_hotel;
        } else if (($parking_search == "show-both") || ($parking_search == "select-option")) {
            $filteredHotels[] = $single_hotel;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 46: PHP Hotel</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Icone FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Icona -->
    <link rel="icon" href="img/icon-logo.png">

    <!-- Custom css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="bg-info-subtle vh-100">
        <div class="container">
            <h1 class="fw-bold text-primary text-center m-0 pt-5 pb-5">
                PHP Hotel
            </h1>

            <!-- Form -->
            <div class="d-flex align-items-center justify-content-center pt-3 pb-5">
                <form method="GET" class="w-50 text-primary">
                    <h4 class="m-0 pb-2 text-center fst-italic">Filters</h4>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Parking:</label>
                        <select class="form-select" name="parking">
                            <option selected value="select-option">Select an option</option>
                            <option value="with-parking">With Parking</option>
                            <option value="without-parking">Without Parking</option>
                            <option value="show-both">Show Both</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Vote:</label>
                        <select class="form-select" name="vote">
                            <option selected value="1">Select an option</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary text-uppercase fw-bold">Search</button>
                    </div>
                </form>
            </div>

            <!-- Tabella -->
            <table class="table text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to center</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- creo le righe della tabella con un foreach su tutti i singoli hotel dell'array -->
                    <?php foreach ($filteredHotels as $single_hotel) { ?>
                        <tr>
                            <!-- con un altro foreach vado a creare le singole celle con i valori dei singoli hotel -->
                            <?php foreach ($single_hotel as $element => $value) { ?>
                                <td>
                                    <?php
                                    // ricerco se la chiave "parking" è true o false
                                    if ($element === "parking") {
                                        if ($value === true) {
                                            echo '<i class="fa-solid fa-check"></i>';
                                        } else {
                                            echo '<i class="fa-solid fa-xmark"></i>';
                                        }
                                    } else {
                                        echo $value;
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
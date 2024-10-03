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


$parking = isset($_GET['parking']) && $_GET['parking'] === 'Si' ? true : false;
$vote = isset($_GET['vote']) ? $_GET['vote'] : 0;

$filteredHotels = [];

foreach ($hotels as $hotel) {
    // Verifica se il parcheggio e il voto corrispondono ai criteri selezionati
    if (($hotel['parking'] == $parking) && ($hotel['vote'] >= $vote)) {
        $filteredHotels[] = $hotel;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!--Form-->
    <section class="bg-primary text-white py-5">
        <form action="filteredHotels.php" method="GET" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Filtra gli hotel che hanno un parcheggio</label>
                            <select class="form-control" name="parking" id="parking">
                                <option>Si</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Filtra gli hotel per voto</label>
                            <select class="form-control" name="vote" id="vote">
                                <option selected>--</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-warning mt-5 fw-semibold">Cerca</button>
        </form>
    </section>
    <!-- Table-->
    <section>
        <table class="table table-striped table-dark">
            <thead class="text-center">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($filteredHotels as $hotel) { ?>
                    <tr>
                        <td><?= $hotel["name"]; ?></td>
                        <td><?= $hotel["description"]; ?></td>
                        <td><?= $hotel["parking"] ? "Sì" : "No"; ?></td>
                        <td><?= $hotel["vote"]; ?></td>
                        <td><?= $hotel["distance_to_center"]; ?> Km</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>
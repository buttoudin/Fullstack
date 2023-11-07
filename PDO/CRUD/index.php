<?php

include'connexion.php';

$stmt = $conn->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PDO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
        <h1 class='col-10'>
            Liste des disques(
            <?php echo count($result); ?>)
        </h1>
        <a href="add_form.php"class='btn btn-primary'> Ajouter</a>
        </div>
        <div class="container">

            <div class="row">
                <div class="card-deck ">
                    <?php foreach ($result as $row) { ?>


                        <div class="col-6 mt-5 ">

                            <div class="card " style="background-color: rgb(211, 211, 211);">

                                <div class="row no-gutters">
                                    <?php echo "<img  src='asset/img/" . $row->disc_picture . "'>"; ?>

                                    <div class="card-body">

                                        <?php
                                        $id = $row->disc_id;
                                        echo '<p class="card-text"><b>' . $row->disc_title . '</b><br>'
                                            . $row->artist_name . '<br>' . '<b>Label </b>:' . $row->disc_label . '<br>'
                                            . '<b>Year </b>: ' . $row->disc_year . '<br>' . '<b>Genre </b>: '
                                            . $row->disc_genre . '</p><a href="details.php?disc_id=' . $id
                                            . '" class="btn btn-primary">Détails</a>';

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>





                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="asset/javascript/ajax.js"></script>
</body>

</html>
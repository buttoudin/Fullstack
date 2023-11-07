<?php

include 'connexion.php';

$result = null; // Initialisation de la variable $result

if (isset($_GET['disc_id'])) {
    $id = $_GET['disc_id'];
    $stmt = $conn->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = :id ");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    $stmt->closeCursor();
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PDO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>

<body>
<?php $id = $result['disc_id'];?>
    <div class="container-fluid">
        <h1>Détails</h1>
        <div class="ml-5">
            <div class="row">
                <div class="col-5 align-items-center ">
                    <label for="titre">Title</label>
                    <div class="bg-secondary p-4 rounded mr-5">
                        <p>
                            <?php echo $result['disc_title']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-5 align-items-center ">
                    <label for="artist">Artist</label>
                    <div class="bg-secondary p-4 rounded mr-5">
                        <p>
                            <?php echo $result['artist_name']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-5 align-items-center ">
                    <label for="titre">Year</label>
                    <div class="bg-secondary p-4 rounded mr-5">
                        <p>
                            <?php echo $result['disc_year']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-5 align-items-center ">
                    <label for="artist">Genre</label>
                    <div class="bg-secondary p-4 rounded mr-5">
                        <p>
                            <?php echo $result['disc_genre']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-5 align-items-center ">
                    <label for="titre">Label</label>
                    <div class="bg-secondary p-4 rounded mr-5">
                        <p>
                            <?php echo $result['disc_label']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-5 align-items-center ">
                    <label for="artist">Price</label>
                    <div class="bg-secondary p-4 rounded mr-5">
                        <p>
                            <?php echo $result['disc_price']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-5 align-items-center ">
                    <label for="titre">Picture</label>
                    <div class="mr-5">
                        <?php echo "<img  src='asset/img/" . $result['disc_picture'] . "'>"; ?>
                    </div>
                </div>
            </div>


            <a href="update_form.php?disc_id=<?= $id?>" class='btn btn-primary mt-3'>Modifier</a>
            <button class="btn btn-primary mt-3" id="retour" onclick="history.go(-1)">Retour</button>
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
    
</body>

</html>
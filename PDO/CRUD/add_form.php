<?php
include 'connexion.php';

$result = null; // Initialisation de la variable $result



try {
    $stmt = $conn->prepare("SELECT * FROM artist");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des artistes: " . $e->getMessage();
}
$stmt->closeCursor();


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
        <h1>Ajouter un vinyle</h1>
        <form action="add_script.php" id='vinyle' method='post'>
            <div class="form-check">
                <div class='form-row'>
                    <label for="titre">Title</label>
                    <input type="text" class='form-control' name="titre" id='titre' placeholder='enter title'>
                    <span id='titreError'></span>
                </div>

                <label for="artist">Artist</label>
                <br>
                <select name="artist" id="artist">
                    <option value="">--Select an artist--</option>
                    <?php foreach ($result as $row) {
                        echo '<option value="' . $row->artist_id . '">' . $row->artist_name . '</option>';
                    } ?>
                </select>
                <span id='artistError'></span>

                <div class='form-row'>
                    <label for="year">Year</label>
                    <input type="text" class='form-control' name="year" id='year' placeholder='enter year'>
                    <span id='yearError'></span>
                </div>

                <div class='form-row'>
                    <label for="genre">Genre</label>
                    <input type="text" class='form-control' name="genre" id='genre'
                        placeholder='enter genre (Rock, Pop, Prog, ...'>
                    <span id='genreError'></span>
                </div>

                <div class='form-row'>
                    <label for="label">Label</label>
                    <input type="text" class='form-control' name="label" id='label'
                        placeholder='enter label (EMI, Warner, Polygram, Univers sale, ...'>
                    <span id='genreError'></span>
                </div>

                <div class='form-row'>
                    <label for="price">Price</label>
                    <input type="text" class='form-control' name="price" id='price'>
                    <span id='priceError'></span>
                </div>

                <div class='form-row'>
                    <label for="pricture">Picture</label>
                    <input type="file" class='form-control' name="picture" id='picture'
                        accept="image/png, image/jpeg, image/webp">
                    <span id='pictureError'></span>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary" id="submit">Envoyer</button>
                    <button class="btn btn-primary" id="retour" onclick="history.go(-1)">Retour</button>
                </div>


            </div>
        </form>
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
<?php

include 'DAO.php';

$result = categorie_index($conn);
$result2 = plat_index($conn);


?>


<div class="container-fluid parallax overflow-hidden">
    <?php require 'header.php'; ?>

    <!-- recherche -->
    <div class="row">
        <div class="d-flex col-12 justify-content-center align-items-center">

            <video class="d-none d-md-flex" id="background-video" autoplay loop>
                <source src="asset/image/FOND_VIDEO.mp4" type=video/mp4>
            </video>
        </div>
        <div class="d-flex col-12 justify-content-center align-items-center mt-4">
            <div class="bg-light p-4 rounded d-none d-md-block " style="width: 80%; max-width: 400px;">
                <form>
                    <div class="form-group d-none d-md-block">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-deck justify-content-center d-none d-md-flex">
        <?php foreach ($result as $row) { ?>


            <div class="col-4 d-flex justify-content-center mt-5">
                <div class="zoom">
                    <a href="categorie.php">
                    <div class="card" style="background-color: rgb(156, 156, 156);">

                        <div class="card-header">
                            Catégorie
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $row->libelle; ?>
                            </h5>

                            <br>
                            <img class="card-img-bottom" src="asset/image/images_the_district/category/<?= $row->image; ?>"
                                alt="Card images Pinterest">
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="card-deck justify-content-center d-md-flex">
        <?php $cache = 0; ?>
        <?php foreach ($result2 as $row) {
            $cache = $cache + 1; ?>




            <?php if ($cache <= 3) { ?>
                <div class="col-md-4 col-12 d-flex justify-content-center mt-5">
                    <div class="zoom">
                        <a href="plat.php">
                        <div class="card" style="background-color: rgb(156, 156, 156);">

                            <div class="card-header">
                                Plat
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $row->libelle; ?>
                                </h5>

                                <br>
                                <img class="card-img-bottom"
                                    src="asset/image/images_the_district/food_sized/<?= $row->image; ?>"
                                    alt="Card images Pinterest">
                            </div>
                        </div>
                        </a>
                    <?php } else { ?>
                        <div class="col-md-4 col-12 d-flex d-md-none justify-content-center mt-5">
                            <div class="zoom">
                                <div class="card" style="background-color: rgb(156, 156, 156);">

                                    <div class="card-header">
                                        Plat
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $row->libelle; ?>
                                        </h5>

                                        <br>
                                        <img class="card-img-bottom"
                                            src="asset/image/images_the_district/food_sized/<?= $row->image; ?>"
                                            alt="Card images Pinterest">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- Réseaux -->

            <br><br><br><br>
    
        </div>
       
    </div>
    <?php require 'footer.php'; ?>
</div>
</body>

</html>
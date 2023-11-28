<?php
include 'DAO.php';

$result = plat_plat($conn);


?>

<div class="container-fluid parallax overflow-hidden">
<?php 
require 'header.php'; ?>
    <!-- recherche -->
    <div class="card-deck justify-content-center d-none d-md-flex">
        <?php foreach ($result as $row) { 
            $id = $row->id;?>
            
            <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
                <div class="zoom">
                    <div class="card ml-3" style="background-color: rgb(156, 156, 156);">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="asset/image/images_the_district/food_sized/<?= $row->image; ?>" class="card-img"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $row->libelle; ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= $row->description; ?>
                                    </p>
                                    <p class="card-text">
                                        <?= $row->prix . "€" ?>
                                    </p>
                                    <a href="commande_form.php?id=<?=$id?>" class="btn btn-primary">Commander</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br><br><br><br>
</div>
    <?php require 'footer.php'; ?>
    </body>

</html>
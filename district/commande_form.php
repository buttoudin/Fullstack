<?php

include 'DAO.php';

$result = commande_commande($conn);




$id = $result['id'];
?>
<div class="container-fluid parallax">
    <?php
    require 'header.php'; ?>

    <div class="container">
        <div id="plat"></div>
        <!-- info -->

        <form class="text-white" action="commande_script.php" id="commande" method="post" enctype="multipart/form-data">
            <div class="card ml-5" style="background-color: rgb(156, 156, 156);">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="asset/image/images_the_district/food_sized/<?= $result['image']; ?>" class="card-img"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $result['libelle']; ?>
                            </h5>
                            <p class="card-text">
                                <?= $result['description']; ?>
                            </p>
                            <p class="card-text">
                                <?= $result['prix'] . '€'; ?>
                            </p>

                            <div class="text-right">
                                <input type="number" name="quantite" id="quantite" value="1" class="mt-5">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="NomPrenom">Nom et prénom</label>
                <input type="text" class="form-check w-100 " name="NomPrenom" id="NomPrenom"
                    placeholder="Saisir votre nom et prénom">
            </div>
            <div class="form-row">

                <div class="col-5 ">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="courriel" id="courriel"
                            placeholder="Saisir votre Email">
                    </div>

                </div>
                <div class="col-5 ml-auto">

                    <div class="form-group">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" name="numero" id="numero"
                            placeholder="Saisir votre numéro de téléphone">
                    </div>


                </div>

            </div>
            <div class="form-group">
                <label for="adresse">Votre adresse</label>
                <input type="text" class="form-check w-100 " name="adresse" id="adresse"
                    placeholder="Saisir votre adresse">
            </div>
            <div class="col-11 text-right mt-5">
                <button type="submit" class="btn btn-primary" id="submit">Envoyer</button>
            </div>
            <input type="hidden" value="<?=$result['libelle']?>" name="libelle">
            <input type="hidden" value="<?=$result['prix']?>"name="prix">
            <input type="hidden" value="<?=$result['id']?>"name="id_plat">
        </form>
    </div>

    <?php require 'footer.php'; ?>
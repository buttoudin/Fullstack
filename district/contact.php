<?php

include 'DAO.php';




?>

<div class="container-fluid parallax">
    <?php require 'header.php'; ?>
    <!-- formulaire -->

    <div class="container text-white">
        <form action="form.php" id="coordonnées" method="post">
            <div class="form-check">
                <div class="form-row">
                    <div class="col-5 form-group">


                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Saisir votre nom">
                        <span id="nomError"></span>


                    </div>
                    <div class="col-5 form-group ml-auto">


                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom"
                            placeholder="Saisir votre prénom">
                        <span id="prenomError"></span>


                    </div>
                </div>

                <div class="form-row">
                    <div class="col-5 form-group">


                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Saisir votre Email">
                        <span id="mailError"></span>


                    </div>
                    <div class="col-5 form-group ml-auto">


                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" name="numero" id="numero"
                            placeholder="Saisir votre numéro de téléphone">
                        <span id="numeroError"></span>



                    </div>
                </div>



                <div class=" form-row">
                    <label for="demande">votre demande</label>
                    <textarea id="demande" class="form-control" name="demande"></textarea>
                    <span id="demandeError"></span>
                </div>
                <div class="col-11 text-right mt-5">
                    <button type="submit" class="btn btn-primary" id="submit">Envoyer</button>

                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>
</body>

</html>
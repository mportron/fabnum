<?php

include "composants/header.php";

?>
<?php include "nav.php"; ?>
<div class="container">

    <div class="jumbotron"><h1>La météo des plages / Saisie</h1></div>

    <div class="row">
        <div class="col-lg-6 col-lg-push-2">
            <form action="validation.php" id="saisie" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="ville" class="col-lg-3 control-label">Nom d'une ville</label>
                    <div class="col-lg-9">
                        <input type="text" name="ville" class="form-control" placeholder="Indiquer le nom d'une ville"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Temp&eacute;rature</label>
                    <div class="col-lg-9">
                        <input type="text" name="temperature" class="form-control" placeholder="Indiquer la température"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Fichier local</label>
                    <div class="col-lg-9">
                        <input type="file" name="file_local" />
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Image distante</label>
                    <div class="col-lg-9">
                        <input type="url" name="file_url" />
                    </div>

                </div>

                <div class="form-group col-lg-9 col-lg-push-3">
                    <button type="submit" class="btn btn-default">Valider</button>
                </div>


            </form>
        </div>
    </div>
</div>
<?php
include "composants/footer.php";
?>
<script type="text/javascript" src="js/jquery_validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/valider_formulaire.js"></script>



<?php
include "composants/header.php";

$meteo=triVilleTemperatureMinimum($meteo,16);
$meteo=ajouterCommentaire($meteo);

?>
<?php include "nav.php"; ?>
<div class="container">

    <div class="jumbotron"><h1>La météo des plages</h1></div>


    <div class="row">
        <?php

        foreach($meteo as $ville=>$detail):
            ?>
            <div class="col-lg-3 col-sm-6 col-xs-10 col-sm-push-0 col-xs-push-1">

                <?php $res= afficheTemperature($ville,$detail);?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $res['phrase']; ?>
                    </div>
                    <?php
                    if(isset($res['icone']) && strlen($res['icone'])>1):
                    ?>
                    <div class="panel-body">
                        <?php echo $res['icone']; ?>
                    </div>
                    <?php endif; ?>
                    <?php
                    if(isset($detail['commentaire'])):
                        ?>
                        <div class="panel-footer">
                            <?php echo $detail['commentaire']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
<?php
include "composants/footer.php";
?>






<?php

include_once "mes_fonctions.php";
include "datas.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>La météo des plages</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>

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
                <div class="panel-body">
                    <?php echo $res['icone']; ?>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
</body>
</html>





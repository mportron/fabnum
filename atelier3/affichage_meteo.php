<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 02/04/17
 * Time: 09:02
 */
foreach($meteo as $ville=>$detail):
    ?>
    <div class="col-lg-3 col-sm-6 col-xs-10 col-sm-push-0 col-xs-push-1">

        <?php $res= afficheTemperature($ville,$detail);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $res['phrase']; ?>
            </div>
            <?php
            if(isset($detail['icone']) && strlen($detail['icone'])>1):
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
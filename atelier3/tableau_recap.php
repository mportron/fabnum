<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 02/04/17
 * Time: 09:02
 */
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered">
            <tr>
                <th>Ville</th>
                <th>T&deg;</th>
                <th>Image</th>
            </tr>
            <?php
            reset($meteo);
            foreach($meteo as $ville=>$detail): ?>
                <tr>
                    <td><?php echo $ville; ?></td>
                    <td><?php echo $detail['temperature']; ?></td>
                    <td><?php echo $detail['icone']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

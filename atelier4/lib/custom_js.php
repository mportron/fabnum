<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 10/04/17
 * Time: 09:11
 */

//// Script js

?>
<script type="text/javascript">

    $(document).ready(function() {

        $('.filtre-temp').click(function(){

            //On cache toutes les villes
            $('.ville').hide();

            //Le clic sur un filtre de la regle selectionne et affiche les elements ayant pour attribut
            //data-temp = le code du filtre cliqué
            $('[data-temp="'+$(this).attr('data-code')+'"]').show();

        });

        $('.reset').click(function(){
            //Affichage de toutes les villes
            $('.ville').show();
        });



    });

</script>


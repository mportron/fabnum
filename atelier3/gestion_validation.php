<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 02/04/17
 * Time: 08:57
 */


$ajoutVille=false;
$ajoutTemperature=false;
$ajoutFichier=false;

///// traitement du fichier s'il existe
if(isset($_FILES['file_local'])):
    $fichier=$_FILES['file_local']['tmp_name'];
    if(preg_match('/image/',$_FILES['file_local']['type'])):
        $destination='icones_meteo/'.$_FILES['file_local']['name'];
        move_uploaded_file($fichier,$destination);
        $ajoutFichier=true;

    endif;
endif;
?>

<?php
////// TEST DE LA VILLE
?>
    <div class="col-lg-4">
        <h4>Test de la valeur pour la Ville</h4>
        <?php
        if(ctype_alpha($_POST['ville'])):
            $ajoutVille=true;
            ?>
            <p class="alert-success">La ville est du bon type</p>
        <?php else: ?>
            <p class="alert-danger">La ville n'est pas du bon type</p>
        <?php endif; ?>


    </div>
<?php
//// TEST DE LA TEMPERATURE
?>
    <div class="col-lg-4">
        <h4>Test de la valeur pour la Température</h4>
        <?php
        $ajoutTemperature=false;
        if(ctype_digit($_POST['temperature'])):
            $ajoutTemperature=true;
            ?>
            <p class="alert-success">La température est du bon type</p>
        <?php else:
            $ajoutTemperature=false;
            ?>
            <p class="alert-danger">La température n'est pas du bon type</p>
        <?php endif; ?>
        <?php
        if(filter_var($_POST['temperature'],FILTER_VALIDATE_INT)):
            $ajoutTemperature=true;
            ?>
            <p class="alert-success">La température passe le test du filtre</p>
        <?php else:
            $ajoutTemperature=true;
            ?>
            <p class="alert-danger">La température ne passe pas le test du filtre</p>
        <?php endif; ?>
    </div>
<?php
/// TEST URL IMAGE DISTANTE
if(isset($_POST['file_url']) && strlen($_POST['file_url'])>5):
    ?>
    <div class="col-lg-4">
        <h4>Test de la valeur de l'url de l'image distante</h4>
        <?php
        $ajoutUrl=false;
        $classe="alert-danger";
        $message='';
        if(filter_input(INPUT_POST,'file_url',FILTER_SANITIZE_URL)):
            $ajoutUrl=true;
            if(filter_var($_POST['file_url'],FILTER_VALIDATE_URL)):
                $ajoutUrl=true;
            else:
                $ajoutUrl=false;
            endif;
        endif;

        if(true==$ajoutUrl):
            $classe="alert-success";
            $message="L'url de l'image vérifie tous les tests";
        else:
            $classe="alert-danger";
            $message="L'url de l'image ne vérifie pas tous les tests";
        endif;
        ?>
        <p class="<?php echo $classe; ?>"><?php echo $message; ?></p>
    </div>
<?php endif; ?>

<?php
/*
 * Ajout des valeurs si les conditions sont respectées
 */
if(true==$ajoutVille && true==$ajoutTemperature):

///Ecriture dans le fichier datas-sources/datas.csv

    $fDatas=fopen('datas-sources/datas.csv',a);

    $ligneAEcrire=[
        $_POST['ville'],
        $_POST['temperature']
    ];


    if(true==$ajoutFichier):
        $ligneAEcrire[]=$destination;
        $ligneAEcrire[]='fichier'; // on indique la provenance... ici c'est un fichier local
    endif;

    if(true==$ajoutUrl):
        $ligneAEcrire[]=$_POST['file_url'];
        $ligneAEcrire[]='url';// et dans ce cas la provenance est une url
    endif;

    fputcsv($fDatas,$ligneAEcrire,";",'"');
    fclose($fDatas);
endif;
?>
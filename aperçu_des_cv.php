<?php
include ('sitedelapromo.php');
if ( isset($_GET['id']) ){
    $id = intval ($_GET['id']);
    include ("connexioncv.php");

    $conn = new mysqli('localhost','root','', 'administration_formation');

    $req = "SELECT id, nom_apprenant, prenom_apprenant,cv_apprenant " .
        "FROM dossiers_apprenants_promo1 WHERE id = " . $id;
    $ret = mysqli_query ($conn,$req) or die (mysqli_error ($conn));
    $col = mysqli_fetch_row ($ret);
    $requete="SELECT * FROM  dossiers_apprenants_promo1";
    $exec=mysqli_query($conn,$requete);
     while ($ligne = mysqli_fetch_assoc($exec)) {
?>
<img alt="" src="dossiers_apprenants_promo1/<?= $ligne['cv_apprenant'] ?>">

<?php
     }
?>
    <img alt="" src="dossiers_apprenants_promo1/<?= $ligne['cv_apprenant'] ?>">
<?php
/*********************************************/
    if ( !$col[0] ){
        echo " ce cv  inconnu";
    } else {
        header ("Content-type: " . $col[1]);
        echo $col[2];
    }

} else {
    echo "choisissez un bon cv  svp";
}


?>


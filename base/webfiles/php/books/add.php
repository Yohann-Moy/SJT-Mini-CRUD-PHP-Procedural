<?php 
    $pageTitle = "Ajout d'un livre";
    require_once('../header.php'); 
?>

<h1>Ajout d'un livre à notre bibliothèque&nbsp;:</h1>

<form method="POST" action="./add.php">
    <input type="text" name="titre" placeholder="Nom de votre livre">
    <textarea name="description" placeholder="Courte description de votre livre"></textarea>
    <input type="number" name="prix" placeholder="Prix du livre">
    <input type="submit" value="Envoyer">
</form>

<?php 

    // Initialisation d'un tableau d'erreurs (vide)
    $errors = [];

    // Si le formulaire a été transmis
    if($_POST){

        // Pour chaque champ du formulaire
        foreach($_POST as $field=>$value){

            // Si le champ est vide (y compris si il ne contient que des espaces)
            if(empty(trim($value))){
                $errors[$field] = $field." non renseigné(e)"; // Stocke l'erreur dans un tableau d'erreurs
            }
            else{

                /* if(...) / else {
                    On pourrait procéder à une vérification approfondie.
                    Ex : le nombre de caractères contenus dans le titre, de la description,
                    le type de données (si il s'agit bien de texte ou de chiffres, etc.)
                }*/
            }
        } // end foreach

        // Si le tableau d'erreurs contient autant d'éléments que le nombre de champs transmis via POST :
        if(sizeof($errors) === sizeof($_POST)){ ?>
            <h2>L'ensemble des champs comportent une ou plusieurs erreur(s).</h2>
        <?php }

        // Le cas contraire...
        else { 
            // On regarde si le tableau des erreurs contient quelque chose
            // Si c'est le cas, on affiche chaque erreur à l'utilisateur 
            if($errors){ ?>
            <ul>
                <?php foreach($errors as $error){ ?>
                    <li><?= $error; ?></li>
                <?php } // endforeach ?>
            </ul>
            <?php } // endif

            // Si le tableau d'erreurs est vide, alors cela signifie que le formulaire a été correctement rempli
            else{
                // Uniquement dans ce cas, il est possible de procéder à l'ajout en base de données.
                
                // Stockage des données issues du formulaire sous forme de variables individuelles 
                $titre = htmlentities($_POST["titre"]);
                $desc = htmlentities($_POST["description"]);
                $prix = $_POST["prix"];
                // Pour rappel : htmlentites permet aux phrases qui contiennent des apostrophes de tout de même être enregistrées.
                
                // Récupération de la connexion à la base de données
                require_once("../dbConnect.php");

                // Si la connexion à la base de données est effective
                if($pdoConn){
                    // Stockage de la requête d'ajout au sein de la variable $query.
                    $query = "INSERT INTO books (name, description, price) VALUES ('$titre', '$desc', $prix)";

                    // Execution de la requête sur la base de données.
                    // Stockage du résultat de l'exécution dans la variable $execution.
                    $execution = $pdoConn->query($query);

                    if($execution){
                        // Si la requête s'est exécutée sans accrocs :
                        // Redirection vers la page qui affiche l'ensemble des livres
                        header('Location: ./all.php');
                    }
                }
            } // Fin de la condition (IF / ELSE) entre le tableau d'erreurs et $_POST ?>
        
    <?php } // fin du cas contraire... ?>

<?php } // Fin du contrôle de l'envoi du formulaire ?>

<?php require_once('../footer.php'); ?>
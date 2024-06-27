<?php
require("./inc/db.php");
if (isset($_SESSION["utilisateur"])) {
    header("Location: index.php");
}
?>
<section>
    <form method="post">
        <h1>Connexion</h1>
        <label for="exampleInputEmail1">Email</label>
        <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" id="exampleInputPassword1" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
    <a href=" ./index.php">Retour vers l'accueil</a>
    <?php
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $request = $pdo->prepare("SELECT * FROM `utilisateur` WHERE `email`= ?;");
        $request->execute([$_POST['email']]);
        $user = $request->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            echo "L'utilisateur ou le mot de passe est invalide";
        } else {
            if ($user["password"] == hash("sha512", $_POST["password"])) {
                echo "vous êtes connecté";
                $_SESSION['id'] = $user["id"];
                $_SESSION["utilisateur"] = $user["login"];
                $_SESSION['role'] = $user["role"];
                header("Location: index.php");
            } else {
                echo "L'utilisateur ou le mot de passe est invalide";
            }
        }
    }
    ?>
</section>
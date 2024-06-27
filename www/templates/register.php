<?php
require("./inc/db.php");
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<section>
    <form method="post">
        <h1>Inscription</h1>
        <label for="login">Pseudo</label>
        <input type="text" id="firstname" name="login" required>
        <label for="exampleInputEmail1">Email</label>
        <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
        <div id="emailHelp">We'll never share your email with anyone else.</div>
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" id="exampleInputPassword1" name="password" required>
        <div>
            <input type="checkbox" id="exampleCheck1">
            <label for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit"">S'inscrire</button>
    </form>
    <a href=" ./index.php">Retour vers l'accueil</a>
            <?php
            // var_dump($_POST);
            $erreur = [];
            $message = [];
            // test pseudo
            if (isset($_POST['login']) && preg_match('/[a-z]+$/', $_POST['login'])) {
                array_push($message, 'ok pour le prénom');
            } else {
                array_push($erreur, 'Le pseudo n\'est pas valide');
            }
            // test email
            if (isset($_POST['email']) && preg_match('/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/', $_POST['email'])) {
                array_push($message, 'ok pour l\'email');
            } else {
                array_push($erreur, 'L\'email n\'est pas valide');
            }
            // test password
            if (isset($_POST['password']) && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#\?])(?=.*[a-zA-Z]).{8,}$/', $_POST['password'])) {
                array_push($message, 'ok pour le mdp');
            } else {
                array_push($erreur, 'Le mdp n\'est pas valide');
            }
            // var_dump($message);
            // var_dump($erreur);
            
            if ($erreur == []) {
                $encrypted_password = hash('sha512', $_POST['password']);
                $request = $pdo->prepare("INSERT INTO utilisateur (login, email, password) VALUES (?, ?, ?);");
                $request->execute([$_POST['login'], $_POST['email'], $encrypted_password]);
                header("Location: ./index.php");
                exit();
            }

            ?>
            <ul>
                <?php
                foreach ($message as $value) {
                    echo "<li>" . $value . "</li>";
                }
                ?>
            </ul>
            <ul>
                <?php
                foreach ($erreur as $item) {
                    echo "<li>" . $item . "</li>";
                }
                ?>
            </ul>
</section>
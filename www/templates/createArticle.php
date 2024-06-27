<?php
require("./inc/db.php");
?>
<article>
    <form method="get">
        <label for="titre">Titre</label>
        <input type="text" id="title" name="titre" required>
        <label for="contenu">Contenu</label>
        <textarea cols="30" rows="10" id="content" name="contenu" required></textarea>
        <label for="catégorie">Contenu</label>
        <select id="category" name="catégorie" required>
            <option value="" disabled selected>Choisir la catégorie</option>
            <option value="news">News</option>
            <option value="team">Team</option>
            <option value="work">Work</option>
        </select>
        <button type="submit">Publier</button>
    </form>
    <?php
    // var_dump($_GET);
    $erreur = [];
    $message = [];
    // test article
    if (isset($_GET['titre']) && isset($_GET['contenu']) && isset($_GET['catégorie'])) {
        array_push($message, 'ok pour l\'article');
        header("Location: index.php");
    } else {
        array_push($erreur, 'L\'article n\'est pas valide');
    }

    if ($erreur == []) {
        $request = $pdo->prepare("INSERT INTO article (titre, contenu, catégorie, date, auteur) VALUES (?, ?, ?, ?, ?);");
        $request->execute([$_GET['titre'], $_GET['contenu'], $_GET['catégorie'], date('Y-m-d H:i:s'), $_SESSION['id']]);
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
</article>
<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo_ecole89.jpg" type="image/x-icon">
    <title>Ecole89 - Student News</title>
    <link rel="stylesheet" href="./css/reboot.css">
</head>

<body>
    <main>
        <section>
            <header>
                <h1>ECOLE89 <br> STUDENTS <br> NEWS</h1>
            </header>
            <div>
                <h2><strong>Latest</strong> news <b>from our students</b></h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita repudiandae impedit aliquam beatae
                    saepe dignissimos ipsa delectus necessitatibus? Illum doloribus, dignissimos unde ea voluptate
                    asperiores perferendis natus iusto molestiae eum.</p>
            </div>
            <footer>
                <?php if (!isset($_SESSION["utilisateur"])): ?>
                    <a href="./indexRegister.php">Inscription</a>
                    <a href="./indexLogin.php">Connexion</a>
                <?php else: ?>
                    <a href="./logout.php">Déconnexion</a>
                    <a href="indexCreateArticle.php">Crée un Artcile</a>
                <?php endif; ?>
                <a href="./index.php">Plan Du Site</a>
                <a href="legal.php">Mentions Légales</a>
                <a href="contact.php">Contact</a>
            </footer>
        </section>
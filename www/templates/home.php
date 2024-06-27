<?php
require("./inc/db.php");
$sqlArticle = "SELECT * FROM `article`;";
$sqlUser = "SELECT * FROM `utilisateur`;";
$requestArticle = $pdo->query($sqlArticle);
$requestUser = $pdo->query($sqlUser);
$articles = $requestArticle->fetchAll(PDO::FETCH_ASSOC);
$users = $requestUser->fetchAll(PDO::FETCH_ASSOC);
function AuthorToUser($idAuthor, $idUsers)
{
    foreach ($idUsers as $user) {
        if ($user["id"] == $idAuthor) {
            return $user["login"];
        }
    }
    return "Inconnue";
}
?>
<section>
    <h1>Latest news</h1>
    <?php foreach ($articles as $get) { ?>
        <article>
            <?php if ($get["catégorie"] == "news"): ?>
                <h3 class="news">news</h3>
            <?php elseif ($get["catégorie"] == "work"): ?>
                <h3 class="work">work</h3>
            <?php elseif ($get["catégorie"] == "team"): ?>
                <h3 class="team">team</h3>
            <?php endif; ?>
            <h2>
                <?php echo $get["titre"] ?>
            </h2>
            <div class="info">
                <img src="images/icon-john.png" alt="">
                <h4><strong>
                        <?php echo AuthorToUser($get["auteur"], $users) ?>
                    </strong><br>
                    <?php echo $get["date"] ?>
                </h4>
            </div>
            <p>
                <?php echo $get["contenu"] ?>
            </p>
            <a href="./single_article.php?id=<?php echo $get["id"] ?>">Continue reading</a>
        </article>
    <?php } ?>
</section>
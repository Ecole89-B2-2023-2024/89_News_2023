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
<?php
foreach ($articles as $get) {
    if ($get["id"] == $_GET["id"]) {
        ?>
        <section>
            <?php if ($get["catégorie"] == "news"): ?>
                <h2 class="news">news</h2>
            <?php elseif ($get["catégorie"] == "work"): ?>
                <h2 class="work">work</h2>
            <?php elseif ($get["catégorie"] == "team"): ?>
                <h2 class="team">team</h2>
            <?php endif; ?>
            <h1>
                <?php echo $get["titre"] ?>
            </h1>
            <div class="info">
                <img src="images/icon-john.png" alt="">
                <h3><strong>
                        <?php echo AuthorToUser($get["auteur"], $users) ?>
                    </strong><br>
                    <?php echo $get["date"] ?>
                </h3>
            </div>
            <div><img src="./images/art_image.png" alt=""></div>
            <p>
                <?php echo $get["contenu"] ?>
            </p>
        </section>
    <?php } ?>
<?php } ?>
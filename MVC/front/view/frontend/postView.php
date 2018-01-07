<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
        <h1>Mon super blog !</h1>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['titre']); ?>
        <em>le <?= $post['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?= nl2br(htmlspecialchars($post['contenu']));
    ?>
    </p>
</div>

<div class = "comments">
<h2>Commentaires</h2>

<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<h4>Commentaires récents</h4>

<?php

while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['auteur']); ?></strong> le <?= $comment['date_commentaire_fr']; ?></p>
<p><?= nl2br(htmlspecialchars($comment['commentaire'])); ?></p>
<p>
<a href="index.php?action=report&commentId=<?= $comment['id'] . "&id=" . $post['id'] ; ?>">Signaler le commentaire ?</a>
 </p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</div>
</body>
</html>
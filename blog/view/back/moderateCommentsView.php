<?php $header = '<a href="index.php?action=moderate">Commentaires</a> / Modérer les commentaires'; ?>

<?php ob_start(); ?>
      <h1>Voici vos commentaires en attente de modération</h1>
      <hr>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Pseudo</th>
                  <th>Date</th>
                  <th>Commentaire</th>
                  <th>Autoriser la publication ?</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($data = $comments->fetch()) 
                {
                ?>
                <tr>
                    <td><?= $data['author'] ?></td>
                    <td><?= $data['comment_date_fr'] ?></td>
                    <td><?= $data['comment'] ?></td>
                    <td>
                        <form method="post" action="index.php?action=moderate&id=<?= $data['id']; ?>">
                        <input type="radio" name="comment_status" value="approved" id="oui" /> <label for="oui">Approuver</label>
                        <input type="radio" name="comment_status" value="denied" id="non" /> <label for="non">Refuser</label>
                        <input type="submit" value="Valider" />
                        </form>
                    </td>
                </tr>
                <?php
                }
                $comments->closeCursor();
                ?>
              </tbody>
            </table>
          </div>
        </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>



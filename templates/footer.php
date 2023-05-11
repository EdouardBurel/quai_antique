<footer class="site-footer" id="contact-details">
  <div class="footer-content">
    <h3>Nos horaires d'ouverture</h3>
    <table class="text-paragraphe">
      <tbody class="tableHour">
        <?php
            $query = 'SELECT * FROM restaurant_hours';
            $res = $pdo->prepare($query);
            $res->execute();

            if ($res->rowCount() > 0) {
                    while ($hour = $res->fetch(PDO::FETCH_ASSOC)) {
          ?>
        <tr>
            <td class="tableDay"><?= $hour['day']; ?> </td>
            <td><?= $hour['lunch_hours']; ?> </td>
            <td><?php if($hour['status'] == 'fermé'){ echo $hour['status'];} ?> </td>
            <td><?= $hour['dinner_hours']; ?> </td>

        </tr>
          <?php
          }
        } else {
          echo "<h5> No Record found </h5>"; } ?>
      </tbody>
    </table>
  </div>
  <div class="footer-menu">
    <ul class="f-menu">
      <li><a href="/index.php">Quai Antique</a></li>
      <li><a href="/menu.php">Menus</a></li>
      <li><a href="/book.php">Réserver une table</a></li>
    </ul>
  </div>
  <div class="footer-bottom">
  <p>Adresse: Rue de la Montagne, Chambery FRANCE</p>
    <p>+33 02 34 56 78 90</p>
    <p>contact@quai-antique.com<p>
  </div>

</footer>
</body>
<script src="main.js"></script>
</body>
</html>
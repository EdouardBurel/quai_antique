<footer class="site-footer" id="contact-details">
  <div class="footer-content">
    <h3>Nos horaires d'ouverture</h3>
    <table class="text-paragraphe">
      <tbody class="tableHour">
        <?php
            $query = 'SELECT * FROM restaurant_hours';
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $hour)
                {
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
    <p> contact@quai-antique.com<p>
  </div>

</footer>
</body>
<style>
  .site-footer {
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #0f4454;
    height: auto;
    padding-top: 40px;
    margin-top: 2rem;
    width: 100vw;
    max-width:100%;
    color: #cab5a7;
  }
  .footer-content {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
  }
  .footer-content h3 {
    font-size: 1.9rem;
    font-weight: 500;
    line-height: 3rem;
  }
  .footer-content table {
    max-width: 50%;
    margin: 10px auto;
    line-height: 8px;
    font-size: 14px;

  }
  .footer-menu {
    margin-bottom: 20px;
    font-size: 1rem;
  }
  .footer-menu ul {
    display: flex;
    justify-content: center;
  }

  .footer-menu ul li {
    padding-right: 10px;
    display: block;
  }
  .footer-menu ul li a {
    color: #cab5a7;
    border: 1.3px solid white;
    padding: 6px 15px;
    border-radius: 50px;
    text-decoration: none;
  }

  .footer-menu ul li a:hover {
    color:#0f4454;
    background-color: #cab5a7;
  }

  .tableDay {
    display: flex;
    justify-content: start;
  }

  .footer-bottom{
    background: none;
    width: auto;
    padding: 20px;
    text-align: center;
  }

  .footer-bottom p {
    text-align: center;
    font-size: 14px;
    word-spacing: 2px;
    text-transform: capitalize;
  }

  .f-menu li {
    font-size: 1.4rem;
    padding: 1rem;
  }

  @media (max-width:500px) {
    .footer-menu ul {
      display: inline;
    }
    
    .footer-menu ul li {
      margin-bottom: 20px;
      text-align: center;
    }
  }
</style>
<script src="main.js"></script>
</body>
</html>
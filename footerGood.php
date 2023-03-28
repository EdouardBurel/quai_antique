<footer>
            <!-- START online : La troisième section de la page -->
        <section class="online" id="contact-details">
            <div class="container-texts" style="overflow-x:auto">
                <h2 class="title-2">Nos Horaires d'ouverture</h2>
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
                                            <td><?= $hour['day']; ?> </td>
                                            <td><?= $hour['lunch_hours']; ?> </td>
                                            <td><?php if($hour['status'] == 'fermé'){ echo $hour['status'];} ?> </td>
                                            <td><?= $hour['dinner_hours']; ?> </td>
    
                                        </tr>
                                        <?php

                                    }
                                }
                                else
                                {
                                    echo "<h5> No Record found </h5>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
        </section>
            <!-- END online -->
    </footer>

</body>
</html>
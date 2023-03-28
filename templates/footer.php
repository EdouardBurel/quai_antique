    <footer class="footer" id="contact-details">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h3 class="footerTitle">Nos horaires d'ouverture</h3>
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
                                }
                                else
                                {
                                    echo "<h5> No Record found </h5>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </footer>

</body>
</html>
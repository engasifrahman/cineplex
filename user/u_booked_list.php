<?php

  require('u_header.php');

  require_once('../class_library/method_class.php');

  $data_view = new Methods;
  $booked_movie = $data_view->booked_data_view();
  $x=NULL;

?>
  
<div class="container-fulid ">
  <div class="col-md-10 col-md-offset-1">

    <div class="panel panel-primary">
      <div class="panel-heading text-center">Booked Movie List</div>
      <div class="panel-body">
        <table class="table">
          <?php
            //echo "<pre>";
            //print_r($movie_table);
            //echo "</pre>";
            if($booked_movie->num_rows >0)
            { 
              ?>               
                <tr>
                  <th>Serial No</th>
                  <th>Movie Name</th>
                  <th>Show Date</th>
                  <th>Show Time</th>
                  <th>Toal Seat</th>
                  <th>Total Bill</th>
                  <th>Booked Date</th>
                </tr>
              <?php

              $x=1;
              while($booked_data = $booked_movie->fetch_assoc())
              {
                $id           = $booked_data['id'];
                $name         = $booked_data['movie_name'];
                $show_date    = $booked_data['show_date'];
                $show_time    = $booked_data['show_time'];
                $total_seat   = $booked_data['total_seat'];
                $total_bill   = $booked_data['total_bill'];
                $booked_at    = $booked_data['booked_at'];


                ?>
                <tr>
                  <td><?php echo $x++; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $show_date; ?></td>
                  <td><?php echo $show_time; ?></td>
                  <td><?php echo $total_seat; ?></td>
                  <td><?php echo $total_bill; ?></td>
                  <td><?php echo $booked_at; ?></td>
                </tr>

                <?php
              }
            }
            else
            {
              ?>
              <tr>

                <td colspan="6" align="center">Their have no data yet</td>

              </tr>

              <?php
            }
          ?>

        </table>
      </div>
    </div>
    
  </div>
</div>


</body>
</html>

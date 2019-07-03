<?php

  require('u_header.php');

  require_once('../class_library/method_class.php');

  $data_view= new Methods;
  $movie_table=$data_view->movie_data_view();
  $x=NULL;


?>
  
<div class="container-fulid ">
  <div class="col-md-10 col-md-offset-1">

    <div class="panel panel-primary">
      <div class="panel-heading text-center">Movie List</div>
      <div class="panel-body">
        <table class="table">
          <?php
            //echo "<pre>";
            //print_r($movie_table);
            //echo "</pre>";
            if($movie_table->num_rows >0)
            { 
              ?>               
                <tr>
                  <th>Serial No</th>
                  <th>Movie Name</th>
                  <th>Director Name</th>
                  <th>Film Genre</th>
                  <th>Cast</th>
                  <th>Release Date</th>
                </tr>
              <?php

              $x=1;
              while($movie_data = $movie_table->fetch_assoc())
              {
                $id           = $movie_data['id'];
                $name         = $movie_data['name'];
                $director     = $movie_data['director'];
                $genre        = $movie_data['genre'];
                $release      = $movie_data['release_date'];
                $cast         = $movie_data['cast'];


                ?>
                <tr>
                  <td><?php echo $x++; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $director; ?></td>
                  <td><?php echo $genre; ?></td>
                  <td><?php echo $cast; ?></td>
                  <td><?php echo $release; ?></td>
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

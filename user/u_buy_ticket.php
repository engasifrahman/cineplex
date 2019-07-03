<?php
  require('u_header.php');

  require_once('../class_library/method_class.php');

  $data_view= new Methods;
  $movie_table=$data_view->movie_data_view();
  $x=NULL;

  if(isset($_POST['signup']))
  {
    $add_movies = new Methods;
    $error=$add_movies->booking_data_insert($_POST);

    //echo '<pre>';
    //var_export($_POST);
    //echo '</pre>';

    //echo '<br>';
    //print_r($error);
  }

?>
  
<div class="container-fulid ">
  <div class="col-md-4 col-md-offset-4 pt-3 bg-white shadow" style="margin-top:50px;">
    <div>
      <?php
      if(isset($error['buy_success']))
      {
        ?>

        <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Congratulations!</strong> <?php echo $error['buy_success']; ?>
        </div>

        <?php
      }

      if(isset($error['db_error']))
      {
        ?>
        <div class="alert alert-danger alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>ERROR! <?php echo $error['db_error'];?>
          </strong>
        </div>
        <?php
      }
      ?>
    </div>
    <h3 class="text-center text-black" style="padding-bottom:20px;"><strong>Buy Movie Tickets!</strong></h3>
    <h6 class="text-center text-primary" style="padding-bottom:20px;">Per Seat 300 TK Only</h6>
    
    <form id="movieForm" class="form-horizontal" method="post" action="">

      <div class="form-group">
        <label class="col-lg-4 control-label">Movie Name</label>
        <div class="col-lg-7">
          <select class="form-control" name="name">
            <option value="">Select Movie Name</option>
            <?php
              //echo "<pre>";
              //print_r($movie_table);
              //echo "</pre>";
              if($movie_table->num_rows >0)
              { 
                $x=1;
                while($movie_data = $movie_table->fetch_assoc())
                {

                  $name= $movie_data['name'];

                  ?>
                  <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                  <?php
                }
              }
              else
              {
                ?>
                <option value="" class="text-danger">No Movie Available</option>
                <?php
              }
              ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">Show Date</label>
        <div class="col-lg-7">
          <input type="date" class="form-control" name="date" min="<?php echo date("Y-m-d");?>" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">Show Time</label>
        <div class="col-lg-7">
          <select class="form-control" name="time">
            <option value="">Select Show Time</option>
            <option value="09">09:00 AM - 12:00 PM</option>
            <option value="01">01:00 PM - 04:00 PM</option>
            <option value="05">05:00 PM - 08:00 PM</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">Number of Seat</label>
        <div class="col-lg-7">
          <input type="number" class="form-control" id="seat" name="seat" min="1" max="100" required/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">Total Bill</label>
        <div class="col-lg-7">
          <span  class="form-control" id="bill" style="border:none"></span>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-4 col-md-offset-4 mb-1" style="padding-left:45px; padding-bottom:10px;">
          <button class="btn btn-success" type="submit" name="signup" value="Sign up">Book Ticket</button>
        </div>
      </div>

    </form>
  </div>
</div>

<script>
  var SeatNoIn = document.getElementById("seat");
  var BillOut = document.getElementById("bill");
  BillOut.innerHTML = 0;

  SeatNoIn.oninput = function() {
    BillOut.innerHTML = parseInt(this.value)*250;
  }
</script>

<script type="text/javascript">
$(document).ready(function() {

    $('#movieForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Movie Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'The Movie Name must be more than 1 and less than 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_. / \-]+$/,
                        message: 'The Movie Name can only consist of alphabetical,number, dot, space, hyphen, backslash and underscore'
                    },
                }
            },
            date: {
              validators: {
                notEmpty: {
                  message: 'The date is required and cannot be empty'
                },
                date: {
                  format: 'YYYY/MM/DD',
                  message: 'The date is not valid'
                }
              }
            },
            time: {
                message: 'The time is not valid',
                validators: {
                    notEmpty: {
                        message: 'The time is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 50,
                        message: 'The time must be more than 2 and less than 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9: ]+$/,
                        message: 'The time can only consist of alphabetical,number, space and colon'
                    }
                }
            },

            seat: {
                message: 'The seat is not valid',
                validators: {
                    notEmpty: {
                        message: 'The seat is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'The seat must be more than 1 and less than 100 characters long'
                    },
                }
            },
        }
    });

});
</script>

</body>
</html>

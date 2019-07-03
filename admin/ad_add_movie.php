<?php
  require('ad_header.php');

  if(isset($_POST['signup']))
  {
    require_once('../class_library/method_class.php');
    $add_movies = new Methods;
    $error=$add_movies->movie_data_insert($_POST);

    //echo '<pre>';
    //var_export($_POST);
    //echo '</pre>';

    //echo '<br>';
    //print_r($error);
    //echo $error['pass_error'];
  }

?>
  
<div class="container-fulid ">
  <div class="col-md-4 col-md-offset-4 pt-3 bg-white shadow" style="margin-top:50px;">
    <div>
      <?php
      if(isset($error['add_success']))
      {
        ?>

        <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Congratulations!</strong> <?php echo $error['add_success']; ?>
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
    <h3 class="text-center text-black" style="padding-bottom:20px;">Add New Movies!</h3>
    
    <form id="movieForm" class="form-horizontal" method="post" action="">

      <div class="form-group">
        <label class="col-lg-4 control-label">Movie Name</label>
        <div class="col-lg-7">
          <input type="text" class="form-control" name="name" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">Director Name</label>
        <div class="col-lg-7">
          <input type="text" class="form-control" name="director" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">Film Genre</label>
        <div class="col-lg-7">
          <input type="text" class="form-control" name="genre" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">Release Date</label>
        <div class="col-lg-7">
          <input type="date" class="form-control" name="release_date" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-4 control-label">cast</label>
        <div class="col-lg-7">
          <textarea class="form-control" name="cast" ></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-4 col-md-offset-4 mb-1" style="padding-left:45px; padding-bottom:10px;">
          <button class="btn btn-success" type="submit" name="signup" value="Sign up">Add Movie</button>
        </div>
      </div>

    </form>
  </div>
</div>

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

            director: {
                message: 'The Derector Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Derector Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'The Derector Name must be more than 3 and less than 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z/_ \.]+$/,
                        message: 'The Derector Name can only consist of alphabetical, dot, space and underscore'
                    }
                }
            },

            genre: {
                message: 'The Film genre is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Film genre is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The Film genre must be more than 3 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z/_ \.]+$/,
                        message: 'The Film genre can only consist of alphabetical, dot, space and underscore'
                    }
                }
            },

            release_date: {
                validators: {
                    notEmpty: {
                      message: 'The Release date is required and cannot be empty'
                    },
                    date: {
                      format: 'YYYY/MM/DD',
                      message: 'The Release date is not valid'
                    }
                }
            },
            cast: {
              message: 'The casts are not valid',
              validators: {
                notEmpty: {
                  message: 'The casts are required and cannot be empty'
                },
                stringLength: {
                  min: 3,
                  max: 30,
                  message: 'The casts are must be more than 3 and less than 30 characters long'
                },
                regexp: {
                  regexp: /^[a-zA-Z/0-9_,;:./()+& \r\n \-]+$/,
                  message: 'The casts are can only consist of alphabetical, number, dot, space, comma, colon, semi colon, hyphen, plus, backslash, amparsand and underscore'
                }
              }
            }
        }
    });

});
</script>

</body>
</html>

<?php
require('header.php');
if(isset($_POST['signup']))
{
  //echo '<pre>';
  //var_export($_POST);
  //echo '</pre>';
  require_once('class_library/registration_class.php');
    
  $reg_data_insert= new Registraion;
  $error = $reg_data_insert->reg_data_insert($_POST);
}

?>
  
<div class="container-fulid ">
  <div class="col-md-6 col-md-offset-3 bg-white shadow margin">
    <div>
      <?php
      if(isset($error['reg_success']))
      {
        ?>

        <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Congratulations!</strong> <?php echo $error['reg_success']; ?>
        </div>

        <?php
      }

      if(isset($error['error']))
      {
        ?>
          <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?php echo "ERROR! <pre>"; print_r($error); echo '</pre>';?>
            </strong>
          </div>
        <?php
      }
      ?>
    </div>
    <div class="page-header">
      <h2 class="text-center">Registration Form</h2>
    </div>
  
  <form id="regForm" class="form-horizontal" method="post" action="">

    <div class="form-group">
      <label class="col-lg-3 control-label">Full Name</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" name="name" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Username</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" name="username" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Gender</label>
      <div class="col-lg-7">
        <div class="radio">
          <label>
            <input type="radio" name="gender" value="male" /> Male
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="gender" value="female" /> Female
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="gender" value="other" /> Other
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Birthday</label>
      <div class="col-lg-7">
        <input type="date" class="form-control" name="dob" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Address</label>
      <div class="col-lg-7">
        <textarea class="form-control" name="address"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Contact</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" name="contact" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Account Balance</label>
      <div class="col-lg-7">
        <select class="form-control" name="balance">
          <option value="">--Select Account Balance--</option>
          <option value="500">500 TK</option>
          <option value="1000">1000 TK</option>
          <option value="1500">1500 TK</option>
          <option value="2000">2000 TK</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Email address</label>
      <div class="col-lg-7">
        <input type="text" class="form-control" name="email" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Password</label>
      <div class="col-lg-7">
        <input type="password" class="form-control" name="password" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Retype password</label>
      <div class="col-lg-7">
        <input type="password" class="form-control" name="confirmPassword" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label" id="captchaOperation"></label>
      <div class="col-lg-7">
        <input type="text" class="form-control" name="captcha" />
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4 col-md-offset-4 mb-1" style="padding-left:40px; padding-bottom:10px;">
        <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up</button>
        <button type="reset" class="btn btn-info">&nbsp;Reset&nbsp;</button>
      </div>
    </div>

  </form>
</div>

</div>


<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#regForm').bootstrapValidator({
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
                        message: 'The first name is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z \.]+$/,
                        message: 'The username can only consist of alphabetical, dot and space'
                    },
                }
            },

            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    different: {
                        field: 'password,confirmPassword',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },

            dob: {
                validators: {
                    notEmpty: {
                      message: 'The birthday is required and cannot be empty'
                    },
                    date: {
                      format: 'YYYY/MM/DD',
                      message: 'The birthday is not valid'
                    }
                }
            },

            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },

          address: {
                    message: 'The address is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The address is required and cannot be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 100,
                            message: 'The address must be more than 3 and less than 100 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#_() \.]+$/,
                            message: 'The address can only consist of alphabetical, number, space, hash, dot, paranthesis and underscore'
                        },
                    }
          },

          contact: {
                    message: 'The contact is not valid',

                    validators: {
                        notEmpty: {
                                      message: 'The contact is required and cannot be empty'
                        },
                        stringLength: {
                            min: 11,
                            max: 15,
                            message: 'The contact must be more than 10 and less than 16 characters long'
                        },
                        regexp: {
                            regexp: /^[0-9/+ \-]+$/,
                            message: 'The contact can only consist of number, space,plus and hyphen'
                        },
                    }
          },

          balance: {
                    message: 'The account balance is not valid',
                    validators: {
                        notEmpty: {
                                      message: 'The account balance is required and cannot be empty'
                        },
                    }
                },

            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                      },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },

            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                            min: 5,
                            max: 100,
                            message: 'The password must be more than 4 and less than 100 characters long'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },

            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    stringLength: {
                            min: 5,
                            max: 100,
                            message: 'The confirm password must be more than 4 and less than 100 characters long'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },

            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

});
</script>


</body>
</html>
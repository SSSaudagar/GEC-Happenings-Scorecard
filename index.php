<?php  
  require_once('includes/calculations.php');
  // print_r($scoreChat);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Events | sad </title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/main.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .description{
        overflow: hidden;
        display: none;
      }
      .desc-active{
        display: block;
      }
      ul.nav li a{
        cursor: pointer;
      }
      #login-form input{
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body id="Event-desc">
    <!-- <h1>Hello, world!</h1> -->
    <div >
      <div class="container">
<!--        <h1>Scorecard</h1>-->
<!--        <button class="btn btn-primary btn-lg pull-right" data-toggle="modal" href="#myModal">LOGIN</button>-->
        <!-- <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">Launch demo modal</a> -->
      </div>
    </div>
    
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Please enter username and password to login</h4>
            </div>
            <div class="modal-body">
              <form id="login-form">
                <input class="form-control" type="text" placeholder="Username"/>
                <input class="form-control" type="password" placeholder="password"/>
                <button type="button" class="btn btn-primary pull-right">Login</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    <section id="navigation-bar">
      <div class="container">
        <div class="row">
          
          <div class="col-md-10-offset-1 score description" style="display:block;">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"> Ranklist</h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>#</th>
                      <th>College</th>
                      <th>Score</th>
                    </tr>
                    <?php  
                    $i = 1;
                    foreach ($scoreChat as $key => $value) {
                      // echo "{$key} => {$value}<br>";
                      echo "
                      <tr>
                        <td>$i</td>
                        <td>$key</td>
                        <td>$value</td>
                      </tr>
                      ";
                      $i++;
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
		<div class="row">
			<a href="organizer/index.php" class="btn btn-success btn-block">Go to admin panel</a>
		</div>
	  </div>
    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- // <script src="http://code.jquery.com/jquery.js"></script> -->
    <script src="assets/js/jquery-1.9.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("ul.nav li").click(function(){
          $("ul.nav li").removeClass("active");
          $(this).addClass("active");
          $(".description").hide();
          // alert("."+this.id);
          var showDesc = "."+this.id;
          $("."+this.id).show();

        });
      });
    </script>


<!--
    <script>
      $(document).ready(function(){

        $("#login-form").click(function(){
          event.preventDefault();
          // alert($("#login-form input[type='text']").val());
          if($("#login-form input[type='text']").val() == 'admin' && $("#login-form input[type='password']").val() == "admin"){
            window.location.href = "admin/index.php";
          }
          else
          {
            $("#login-form input[type='text']").attr("id","inputError");
          }
          return false;
        });
      });
    </script>
-->
    <!-- // <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <!-- // <script type="text/javascript" src="assets/js/jQuery.mmenu-master/src/js/jquery.mmenu.js"></script> -->
  </body>
</html>
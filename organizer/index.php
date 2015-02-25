<?php
  require_once('../includes/DbConnection.php');

function events(){
    $sql="select * from events";
    $result=mysql_query($sql);
    while($row=mysql_fetch_assoc($result)){
        echo "<option value={$row['event_id']}>{$row['event_name']}</option>";
    }
}

if(isset($_POST['add-college'])){
    $sql="Insert into colleges (college_name) values ('{$_POST['college']}')";
//    echo $sql;
    if (mysql_query($sql)) {
    echo "
    <script type='text/javascript'>
    alert('Added Successfully');
    </script>
    ";
    } else {
//        die(mysql_error());
        $msg=mysql_error();
        echo "
        <script type='text/javascript'>
        alert('ERROR: {$msg}');
        </script>
        ";
      //echo "ERROR: ".mysql_error();
    }
}

if(isset($_POST['event-go'])){
    header("Location: event.php?id={$_POST['event']}");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin </title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../assets/css/main.css" rel="stylesheet" media="screen">
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
      .image{
        width: 180px;
        height: 180px;
        background-color: #D6D6D6;
        border-radius: 100%;
        margin: auto;
        position: relative;
      }
      .image h2{
        text-align: center;
        padding: 70px 0;
        font-size: 27px;
      }
      .image a{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
      }
        
    </style>
  </head>
  <body id="Event-desc">
    <!-- <h1>Hello, world!</h1> -->
    <div class="jumbotron">
      <div class="container">
        <h1>Happenings</h1>
      </div>
    </div>

    <section id="navigation-bar">
      <div class="container">
        <div class="row" style="height:150px;">
            <form action="index.php" method="post">
                <div class="col-md-2"><h3>Add College:</h3></div>
                <div class="col-md-8 form-group"><input type="text" name="college" class="form-control"></div>
                <div class="col-md-2"><button class="btn btn-primary btn-block" name="add-college" type="submit">Add</button> </div>
            </form>
            <hr>
        </div>
          

        <div class="row" style="height:150px;">
            <div class="col-md-6">
                <form action="index.php" method="post">
                    <div class="row">
                        <div class="col-md-9 form-group">
                            <select name="event" class="form-control" required>
                                <option value="">Select Event</option>
                                <?php events(); ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="event-go" class="btn btn-default btn-block">Go</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success btn-block" href="registration.php">Register</a>
            </div>
        </div>
      </div>
    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- // <script src="http://code.jquery.com/jquery.js"></script> -->
    <script src="../assets/js/jquery-1.9.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!--
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
-->
    <!-- // <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <!-- // <script type="text/javascript" src="assets/js/jQuery.mmenu-master/src/js/jquery.mmenu.js"></script> -->
  </body>
</html>
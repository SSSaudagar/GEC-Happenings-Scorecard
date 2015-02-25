<?php  
  require_once('../includes/DbConnection.php');
function colleges(){
    $sql="select * from colleges";
    $result=mysql_query($sql);
    while($row=mysql_fetch_assoc($result)){
        echo "<option value={$row['college_id']}>{$row['college_name']}</option>";
    }
}
function events(){
    $sql="select * from events";
    $result=mysql_query($sql);
    while($row=mysql_fetch_assoc($result)){
        echo "<option value=\"{$row['event_id']}\">{$row['event_name']}</option>";
    }
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $college = $_POST['college'];
    $event = $_POST['event'];
    $phone = $_POST['phone'];
    $sql="insert into register values ({$college},{$event},'{$name}','{$phone}') ";
    if (mysql_query($sql)) {
    echo "
    <script type='text/javascript'>
    alert('Added Successfully');
    </script>
    ";
    } else {
        $msg=mysql_error();
        echo "
        <script type='text/javascript'>
        alert('ERROR: {$msg}');
        </script>
        ";
      //echo "ERROR: ".mysql_error();
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <section id="registration-form">
      <div class="container">
        <div class="row">
            <h1>Registration Form</h1>
            <form role="form" action="registration.php" method="POST">
                <div class="form-group">
                    <label for="college">College</label>
                    <select name="college" class="form-control" required >
                        <option value="">Select</option>
                        <?php colleges() ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Incharge:</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="name" required />
                </div>
                <div class="form-group">
                    <label for="phone">Contact Number:</label>
                    <input class="form-control" name="phone" type="number" maxlength = 10 required ></input>
                </div>
                <div class="form-group">
                    <label for="event">Event</label>
                    <select name="event" class="form-control" required >
                        <option value="">Select</option>
                        <?php events() ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="submit">Register</button>
                </div>
            </form>    
        </div>
      </div>
    </section>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-1.9.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- // <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <!-- // <script type="text/javascript" src="assets/js/jQuery.mmenu-master/src/js/jquery.mmenu.js"></script> -->
  </body>
</html>
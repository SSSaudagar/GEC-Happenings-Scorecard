<?php  
  require_once('../includes/DbConnection.php');
function colleges(){
    $sql="SELECT college_id,college_name from register natural join colleges where event_id={$_GET['id']}";
    $result=mysql_query($sql);
    while($row=mysql_fetch_assoc($result)){
        echo "<option value={$row['college_id']}>{$row['college_name']}</option>";
    }
}

function displayParticipants($eventName){
    $query = "SELECT college_id,college_name,incharge,phone from register natural join colleges where event_id={$_GET['id']}";
    $result = mysql_query($query);
    $i = 1;
    
    while($row = mysql_fetch_assoc($result)){
      echo "
      <tr>
        <td>{$i}</td>
        <td>{$row['college_name']}</td>
        <td>{$row['incharge']}</td>
        <td>{$row['phone']}</td>
      </tr>
      ";
      $i++;
    }
}

if(isset($_POST['joker'])){
    $sql="insert into winners values({$_GET['id']},{$_POST['college']},0,1)";
    mysql_query($sql) or die(mysql_error());
}

if(isset($_POST['submit'])){
    $first=$_POST['first'];
    $second=$_POST['second'];
    $third=$_POST['third'];
    if(isset($_POST['first-joker'])){
        $first_joker=1;
    }else{
        $first_joker=0;
    }
	if(isset($_POST['second-joker'])){
		$second_joker=1;
	}else{
        $second_joker=0;
    }
	if(isset($_POST['third-joker'])){
		$third_joker=1;
	}else{
        $third_joker=0;
    }
    $event_id=$_POST['event'];
    $sql="insert into winners values({$event_id},{$first},1,{$first_joker}),({$event_id},{$second},2,{$second_joker}),({$event_id},{$third},3,{$third_joker})";
    echo $sql;
    mysql_query($sql) or die(mysql_error());
    header("Location: index.php");
}

$sql="Select * from events where event_id={$_GET['id']} ";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $row['event_name'] ?></title>
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
      .center-block{
        margin: auto;
        float: none;
      }
    </style>
  </head> 
  <body id="event-coordinator-page">
      
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Enter college ehich has lost a Joker</h4>
            </div>
            <div class="modal-body">
              <form id="login-form" action="event.php?id=<?php echo $_GET['id']?>" method="post">
                  <div class="form-group">
                      <select class="form-control" name=college required>
                        <option value="">Select</option>
                        <?php colleges();?>  
                      </select>
                    </div>  
                <button type="submit" class="btn btn-danger btn-block" name="joker">Jokered</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      
    <!-- <h1>Hello, world!</h1> -->
    <div class="jumbotron">
      <div class="container">
        <h1><?php echo $row['event_name'] ?></h1>
      </div>
    </div>
    <section id="event-coordinator">
      <div class="container">
        <div class="row">
          <div class="col-md-8 center-block">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>ID</th>
                  <th>CollegeName</th>
                  <th>Incharge</th>
                  <th>Phone</th>
                </tr>
                <?php 
                  displayParticipants("bbuz");
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 center-block">
            <form class="form-horizontal" role="form" action="" method="post">
              <h2 class="text-center">Winners</h2>
              <div class="form-group">
                <label for="first" class="col-lg-2 control-label">First</label>
                <div class="col-lg-8">
                    <select name="first" class="form-control" required>
                        <option value="">Select</option>
                        <?php colleges() ?>
                    </select>
                </div>
                <div class="col-md-2 checkbox">
                      <label><input type="checkbox" name="first-joker">Joker</label>
                </div>
              </div>
              <div class="form-group">
                <label for="first" class="col-lg-2 control-label">Second</label>
                <div class="col-lg-8">
                    <select name="second" class="form-control" required>
                        <option value="">Select</option>
                        <?php colleges() ?>
                    </select>
                </div>
                <div class="col-md-2 checkbox">
                      <label><input type="checkbox"  name="second-joker">Joker</label>
                </div>
              </div>
              <div class="form-group">
                <label for="first" class="col-lg-2 control-label">Third</label>
                <div class="col-lg-8">
                    <select name="third" class="form-control" required>
                        <option value="">Select</option>
                        <?php colleges() ?>
                    </select>  
                </div>
                <div class="col-md-2 checkbox">
                      <label><input type="checkbox" name="third-joker">Joker</label>
                </div>
              </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-md-4">
                        <button class="btn btn-danger btn-block" data-toggle="modal" href="#myModal">Jokered</button>
                    </div>
                    <div class=" col-md-4">
                      <button name="submit" type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                  </div>
                </div>
                <input name="event" value="<?php echo $_GET['id']?>" style="display:none" readonly>
            </form>
          </div>
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
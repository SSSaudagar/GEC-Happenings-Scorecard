<?php  
  require_once('DbConnection.php');
  require_once('function.php');
?>

<?php  
function calcScorePerBranch($branch){
	$query = "SELECT COUNT(*)'number' FROM first where branch = '{$branch}'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$first = $row['number'];

	$query = "SELECT COUNT(*)'number' FROM second where branch = '{$branch}'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$second = $row['number'];

	$query = "SELECT COUNT(*)'number' FROM third where branch = '{$branch}'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$third = $row['number'];

	$score=1500*$first + 1000* $second + 500*$third;
	return $score;
}

$scoreChat = 
array(
	"Computer" => calcScorePerBranch('Computer'),
	"Mechanical" => calcScorePerBranch('Mechanical'),
	"IT" => calcScorePerBranch('IT'),
	"Civil" => calcScorePerBranch('Civil'),
	"ENE" => calcScorePerBranch('ENE'),
	"ETC" => calcScorePerBranch('ETC'),
	"Mining" => calcScorePerBranch('Mining')
);
arsort($scoreChat);
// print_r($scoreChat);

?>
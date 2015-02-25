<?php
  require_once('DbConnection.php');
function joker_penalty($college){
    $sql="select count(*) as count from winners where college_id={$college} and joker=1";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    $joker=$row['count'];
    if($joker==0){
        $score=(-400);
    }else{
        $score=0;
    }
//    echo "penalty:{$score}";
    return $score;
}
function getcount($college,$joker,$event,$place){
    $sql="select count(*) as count from winners natural join events join event_type on type=id where college_id={$college} and joker={$joker} and name='{$event}' and place={$place}";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    return $row['count'];
}
function kingscore($college){
    $score=0;
    $type = 'King';
    $first_joker = getcount($college,1,$type,1);
    $second_joker = getcount($college,1,$type,2);
    $third_joker = getcount($college,1,$type,3);
    $no_joker = getcount($college,1,$type,0);
    $first=getcount($college,0,$type,1);
    $second=getcount($college,0,$type,2);
    $third=getcount($college,0,$type,3);
    $score=$score + ($first_joker * 1600); 
    $score=$score + ($second_joker * 300); 
    $score=$score + ($third_joker * 100); 
    $score=$score - ($no_joker * 300); 
    $score=$score + ($first * 800); 
    $score=$score + ($second * 600); 
    $score=$score + ($third * 400);
//    echo "king:{$score}";
    return $score;
}
function queenscore($college){
    $score=0;
    $type = 'queen';
    $first_joker = getcount($college,1,$type,1);
    $second_joker = getcount($college,1,$type,2);
    $third_joker = getcount($college,1,$type,3);
    $no_joker = getcount($college,1,$type,0);
    $first=getcount($college,0,$type,1);
    $second=getcount($college,0,$type,2);
    $third=getcount($college,0,$type,3);
    $score=$score + ($first_joker * 1200); 
    $score=$score + ($second_joker * 300); 
    $score=$score + ($third_joker * 100);
    $score=$score - ($no_joker * 100);
    $score=$score + ($first * 600); 
    $score=$score + ($second * 400); 
    $score=$score + ($third * 200);
//    echo "queen:{$score}";
    return $score;
}
function acescore($college){
    $score=0;
    $type='Ace';
    $first=getcount($college,0,$type,1);
    $second=getcount($college,0,$type,2);
    $third=getcount($college,0,$type,3);
    $score=$score + ($first * 1000); 
    $score=$score + ($second * 800); 
    $score=$score + ($third * 600);
//    echo "ace:{$score}";
    return $score;
}
function trumpscore($college){
    $sql="select count(*) as count from winners natural join events join event_type on type=id where college_id={$college}  and name='trump'";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    if($row['count']==0) return 0;
    $sql="select place  from winners natural join events join event_type on type=id where college_id={$college}  and name='trump' ";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    switch($row['place']){
        case 0: $score=100; break;
        case 1: $score=500; break;
        case 2: $score=400; break;
        case 3: $score=300; break;
    }
//    echo "trump:{$score}";
    return $score;
}
function calcScore($college){
    $score=joker_penalty($college);
    $score=$score + acescore($college);
    $score=$score + kingscore($college);
    $score=$score + queenscore($college);
    $score=$score + trumpscore($college);
    return $score;
    
}

$scoreChat = array();
$sql="Select * from colleges";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result)){
    $scoreChat[$row['college_name']]=calcScore($row['college_id']);
}
arsort($scoreChat);
//print_r($scoreChat);
?>
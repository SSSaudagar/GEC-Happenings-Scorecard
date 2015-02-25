<?php  
  function displayParticipants($eventName){
    $query = "SELECT name, uid FROM register WHERE {$eventName} = 1";
    $result = mysql_query($query);
    $i = 1;
    
    while($row = mysql_fetch_assoc($result)){
      echo "
      <tr>
        <td>{$i}</td>
        <td>{$row['name']}</td>
        <td>{$row['uid']}</td>
      </tr>
      ";
      $i++;
    }
  }

  
?>
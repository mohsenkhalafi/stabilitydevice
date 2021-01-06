<?php 
$file = 'server.dat';
$contents = file_get_contents($file);
include 'config.php';
if($_POST['code']==''){
  	$sql = "SELECT * from markaz ";  
}else
{
$sql = "SELECT * from markaz where namef LIKE '%".$_POST['code']."%'";
}
	mysqli_set_charset($link,"utf8");
						$result = mysqli_query($link, $sql);
echo '<div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                       <th>شماره ردیف</th>
						
                        <th>نام مرکز</th>
						<th>شهر </th>
                        <th>شماره Vlan</th>
                        <th>IP</th>
                       <th>وضعیت </th>
                        <th align="center" width="120px">گراف</th>
                    </tr>
                    </thead>
  ';
  
  
						if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$i=1;
    while($art = mysqli_fetch_assoc($result)) {
		


    echo '<tbody>
                  
                    
                   
                        <tr>
                            <td> '.$art["id"].'</td>
                          
                            <td>'.$art["namef"].'</td>
							<td >'.$art["city"].'</td>
                            <td>'.$art["vlan"].'</td>
                            <td>'. $art["ip"].'</td>';
                          if (stripos($contents, $art["namef"]) !== false) {
								echo '<td align="center" bgcolor="#FD4C26"> Down </td>' ;
							}else{
								echo	 '<td align="center" bgcolor="#26FD61"> Up </td>' ;
								}

                          
                          echo  '<td>';
                               
                           echo     '<a href="http://zabbix.rahanet.com/zabbix/charts.php?graphid='.$art['graph'].'"> <img src="img/graph.png" width="30px" height="30px"></a>
                           </td>
                        </tr>
                      
                        
                     
                    ';
  }
  }
 echo ' </tbody>
</table>';



 ?>
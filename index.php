<?php include "header.php"?>

<div class="container-fluid">
    <div class="row">
       <?php include 'sidebar.php'; ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		مراکز قطع شده: <?php $myfile = fopen("server.dat", "r") or die("Unable to open file!"); echo'<div align="right" style="background-color:#FF4D4D;border-radius:4px;padding:3px;">'. file_get_contents("server.dat").'</div>'; ?>
             <div class="col-xs-2">
    <label for="ex1">جستجو بر اساس مرکز</label>
    <input class="form-control" oninput="Search()" id="code" type="text">
    <p id="demo"></p>
  </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
				
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
                    <tbody>
                    <?php
                    include "list.php";
                    $file = 'server.dat';
					$contents = file_get_contents($file);
					$c=0;
                    foreach ($marakez as $art){
						
						$c=$c+1;
						?>
                        <tr>
						
						<?php echo '<td>'.$c ?></td>
							
                            
                          
                            <td><?php echo $art["namef"]?></td>
							  <td><?php echo $art["city"]?></td>
                            <td><?php echo $art["vlan"]?></td>
                            <td><?php echo $art["ip"]?></td>
                          

                          <?php if (stripos($contents, $art["namef"]) !== false) {
								echo '<td align="center" bgcolor="#FD4C26"> Down </td>' ;
							}else{
									echo '<td align="center" bgcolor="#26FD61"> Up </td>' ;
								}
								?>
                            <td align="center">
                                <?php //echo '<a href="ping.php?ip='.$art['ip'].'"> <img src="img/ping.png" width="30px" height="30px"> </a>'; ?>
                                <?php echo '<a href="http://zabbix.rahanet.com/zabbix/charts.php?graphid='.$art['graph'].'">  <img src="img/graph.png" width="30px" height="30px"> </a>'; ?>
                            </td>
                        </tr>
                      
                        
                    <?php } ?>
                    </tbody>
                
				</table>
            </div>
			<script>
function Search(){
    
    var code = $('#code').val();
    
    
        $.ajax({
            type:'POST',
            url:'codesearch.php',
            data:'contactFrmSubmit=1&code='+code,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(response){
               
                   
                  
                   $("#table").html(response);
                
               
            }
        });
    
}
</script>


<?php  if(filesize("alarm.dat") > 0 ){$filename = "alarm.dat";
$fp = fopen($filename, "r");

$content = fread($fp, filesize($filename));
$lines = explode("\n", $content);
fclose($fp);   echo '<body onload="showNotification(`'.implode('',$lines).'`);" >';file_put_contents('alarm.dat', '');} else {}	?>
				

					</script>
					<script type="text/javascript">
    setTimeout(function () { 
      location.reload();
    }, 20 * 1000);
</script>
        </main>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>







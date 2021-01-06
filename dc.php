<?php include "header.php"?>

<div class="container-fluid">
    <div class="row">
       <?php include 'sidebar.php'; ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
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
                    foreach ($marakez as $art){?>
                        <tr>
						
                         <?php $myfile = fopen("server.dat", "r") or die("Unable to open file!"); while(!feof($myfile)) { echo fgets($myfile) . `<br>`;}fclose($myfile); ?>

                          <?php if (stripos($contents, $art["namef"]) !== false) {
								echo '<td align="center" bgcolor="#FD4C26"> Down </td>' ;
									'<td>'.$art["id"].'</td>
									<td>'. $art["namef"].'</td>
									<td>'.  $art["city"].'</td>
									<td>'.  $art["vlan"].'</td>
									<td>'.  $art["ip"].'</td>
									 <td align="center">
                                
                                 <a href="http://zabbix.rahanet.com/zabbix/charts.php?graphid='.$art['graph'].'">  <img src="img/graph.png" width="30px" height="30px"> </a>
                            </td>';
							}else{
									//echo '<td align="center" bgcolor="#26FD61"> Up </td>' ;
								}
								?>
                           
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
<script type="text/javascript">
    setTimeout(function () { 
      location.reload();
    }, 200 * 1000);
</script>
<script type="text/javascript">
 $(document).ready(function () {
						
						showNotification(`<?php $myfile = fopen("server.dat", "r") or die("Unable to open file!"); while(!feof($myfile)) { echo fgets($myfile) . `<br>`;}fclose($myfile);	?>`);
 }
					</script>
        </main>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>







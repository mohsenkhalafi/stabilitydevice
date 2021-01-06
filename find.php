<?php
//$file = 'server.dat';
//$searchfor = 'Nokia';

// the following line prevents the browser from parsing this as HTML.
//header('Content-Type: text/plain');
 
// get the file contents, assuming the file to be readable (and exist)
//$contents = file_get_contents($file);
// escape special characters in the query
//$pattern = preg_quote($searchfor, '/');
//echo str_replace('Nokia','',$contents);
// finalise the regular expression, matching the whole line
//$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
//if(preg_match_all($pattern, $contents, $matches)){
 //  echo "Found matches:\n";
 //  echo implode("\n", $matches[0]);
//}
//else{
 //  echo "No matches found";
//}
?>
<?php
//$filename = "dat.dat"; // file name 
//$LIMIT = 42;
//$newLine = "25"; // whatever is to be appended.
//$file = file($filename);
//$count = count($file);
//if($count == $LIMIT) {
   //$file = array_splice($file,0,1);
 //  $count = $LIMIT-1;
//}
//$file[$count]= $newLine;
//$bn=str_replace('5','',$file);
//file_put_contents($filename,implode(PHP_EOL,$bn)); 

?>
 <?php
$line_no = 0;
$fname = "dat.dat";
$lines = file($fname);
foreach($lines as $line) {
   $line_no++;
   if(!strstr($line, "4") && $line_no == 4) $out .= $line;
}
$f = fopen($fname, "w");
fwrite($f, $out);
fclose($f);
?> 
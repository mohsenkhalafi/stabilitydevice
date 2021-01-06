
$(document).ready(function() {
$('form').submit(function(event){
  
     		
	alert("test");		
var name = document.getElementById("name").value;
var negin_no = document.getElementById("negin_no").value;
var esalat_negin = document.getElementById("esalat_negin").value;
var rekab_no = document.getElementById("rekab_no").value;
var mohre_rekabsaz = document.getElementById("mohre_rekabsaz").value;
var tole_negin = document.getElementById("tole_negin").value;
var vazn = document.getElementById("vazn").value;
var sex = document.getElementById("sex").value;
var sang_negin = document.getElementById("sang_negin").value;
var jens_rekab = document.getElementById("jens_rekab").value;
var rekabsaz = document.getElementById("rekabsaz").value;
var size_rekab = document.getElementById("size_rekab").value;
var arze_negin = document.getElementById("arze_negin").value;
var geymat = document.getElementById("geymat").value;

var dataString = '$name=' + name + '&negin_no=' + negin_no + '&esalat_negin=' + esalat_negin + '&rekab_no=' + rekab_no + '$mohre_rekabsaz='  + mohre_rekabsaz + '$tole_negin=' + tole_negin + '$vazn=' + vazn + '$sex=' + sex + '$sang_negin=' + sang_negin
 '$jens_rekab'+ jens_rekab + '$rekabsaz'  + rekabsaz  + '$size_rekab'  + size_rekab + '$arze_negin' + arze_negin + '$geymat' + geymat;
if (name == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
url: "submit.php",
type: "POST",
data: dataString,
dataType: 'json', 
encode  : true
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
)}
 
   )}

















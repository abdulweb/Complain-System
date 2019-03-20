 $(document).ready(function(){

	  $('.select').change(function(){
	  
if ($('select').val() == 'Adm_no'){
$('.frm').empty();
var text1 = '<input class= "form-control mr-sm-2" type="text" placeholder="Search Record" aria-label="Search" id = "record" name = "record" pattern = "[0-9]+">';
var text2 = '<button class="btn btn-outline-success btn-sm my-0" value = "submit" name="submit">Search </button>';
$(".frm").append(text1, text2);
}
else {
$('.frm').empty();
var text1 = '<input type="text"  class="form-control" placeholder="yyyy-mm-dd" name = "date" id = "date" pattern = "[0-9]{4}\-[0-9]{2}\-[0-9]{2}">';
var text2 = '<button class="btn btn-outline-success btn-sm my-0" value = "submit" name="submit">Search </button>';
$(".frm").append(text1, text2);
}
});
  $('.send').click(function(p){
    p.preventDefault();
 //get the url
	$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	return results[1] || 0;
}
var recieve = $('#solution').val();
var identify = $.urlParam('id');
    $('.done'). html('<img src = "image/loader.gif" alt = "send sms" class = "mx-auto">');
        $.ajax({
          type : "POST",
          url : "makedecision.php",
          data: {"solution": recieve, "id" : identify},
          success:function(rel){
            $('.done').html('');
			//alert(rel);
            window.location.reload(true);
            },
          error: function(){
            alert("there is a problem sending the data to the database");
          }
          
            });
      });
	 });

/* javascript code */
// this is use to update the date on the site.
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('date').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

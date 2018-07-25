$(function() {
	$("#addmenu").click(function(){
       var addmenuname  = $("#addmenuname").val();
       var addmenu_url  = $("#addmenu_url").val();
       var menu_id_add  = $("#menu_id_add").val();
       var dataString   = 'addmenuname='+addmenuname+'&addmenu_url='+addmenu_url+'&menu_id_add='+menu_id_add;

       $.ajax({
           type:"POST",
           url:"getregister.php",
           data:dataString,
           success:function(data){
           	  $("#state").html(data);
               // $("#state").fadeOut(5000);

           }
       });
       
       return false;

	});
});

function Redirect(){
	window.location="menu_list.php";
}

function PopulerNewsPaper(){
  window.location="addPopulerNewsPaper.php";
}

function sdgfg(){
  window.location="populer_list.php";
}

function post_add(){
  window.location="addpost.php";
}

function post_list(){
  window.location="post_list.php";
}

function cat_list(){
  window.location="category.php";
}
function addRadio(){
  window.location="addRadio.php";
}

function viewRadiolist(){
  window.location="radio-list.php";
}

function NewsPaperAdd(){
  window.location="addNewspaper.php";
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

//function fade() {
   // $('#state').fadeIn().delay(5000).fadeOut();
   // $('#state').delay(5000).fadeIn().delay(5000).fadeOut();
   // $('#state').delay(10000).fadeIn().delay(5000).fadeOut(fade);
//}
//fade();
/*
function fadetime(){
	$("#deleteMassagetimeout").fadeOut(5000);
}
fadetime();

$(document).ready(function(){
  $(document).on('click', '.btn_delete', function(){
    var id = $(this).data("id3");
    if (confirm("Are you sure you want to delete this?")) {
    $.ajax({
         url:"menu_delete.php",
         method:"POST",
         data:{id:id},
         dataType:"text",
         success:function(data){
            $("#deleteMess").html(data);
           }
        });
    }
    return false;
  });
});  */
$(document).ready(function(){
  $("#MailInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mailSearchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


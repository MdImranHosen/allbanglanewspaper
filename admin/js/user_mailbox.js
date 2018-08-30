function viewdata(){
        $.ajax({
          url: '../ajax/getDataMailbox.php',
          type: 'GET',
          success: function(data){
            $('tbody').html(data)
          }
        })
      }

$('#delsel').click(function(){
        var id = $('.checkitem:checked').map(function(){
          return $(this).val()

        }).get().join(' ')
        $.post('../ajax/getDataMailbox.php?p=del', {id: id}, function(data){
          viewdata()
        })
         
 });

//View Send mail data...
function viewsendmaildata(){
        $.ajax({
          url: '../ajax/getDataSendMail.php',
          type: 'GET',
          success: function(data){
            $('tbody').html(data)
          }
        })
      }

$('#deletesendm').click(function(){
        var id = $('.checkitem:checked').map(function(){
          return $(this).val()

        }).get().join(' ')
        $.post('../ajax/getDataSendMail.php?pp=delsend', {id: id}, function(data){
          viewsendmaildata()
        })
         
 });
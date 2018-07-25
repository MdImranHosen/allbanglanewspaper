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



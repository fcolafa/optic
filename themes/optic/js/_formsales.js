  $(document).ready(function(){

  var droplist = $('#Sales_id_type');
  if(droplist.val()!='2')
       $('#frame').hide();
  droplist.change(function(e){
    if (droplist.val() == '2') {
      $('#frame').show();
    }
    else {
      $('#frame').hide();
    }
  })
});


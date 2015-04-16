  $(document).ready(function(){

  var droplist = $('#Reports_reportype');
  if(droplist.val()!='1')
       $('#yearrow').hide();
   if(droplist.val()!='2')
       $('#range').hide();
  droplist.change(function(e){
    if (droplist.val() == '1') {
      $('#yearrow').show();
    }
    else {
      $('#yearrow').hide();
      $('#Reports_reportyear').val("");
    }
      if (droplist.val() == '2') {
      $('#range').show();
    }
    else {
      $('#range').hide();
      $('#Reports_initdate').val("");
      $('#Reports_endate').val("");
    }
  })
});
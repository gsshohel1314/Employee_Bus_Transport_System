$(document).ready(function(){
  $(".delete").click(function(){
    var url=$(this).data('rana');
    $('#delete').attr('action', url);
  });
});

$(document).ready(function(){
  $(".recycle").click(function(){
    var url=$(this).data('recycle');
    $('#recycle').attr('action',url);
  });
});

$(document).ready(function(){
  $(".approve").click(function(){
    var url=$(this).data('approve');
    $('#approve').attr('action',url);
  });
});

$(document).ready(function(){
  $(".status").click(function(){
    var url=$(this).data('status');
    $('#status').attr('action',url);
  });
});

$(document).ready(function(){
  $(".pickdelete").click(function(){
    var url=$(this).data('url');
    $('#pickdelete').attr('action', url);
  });
});

$(document).ready(function(){
  $(".routedelete").click(function(){
    var url=$(this).data('url');
    $('#routedelete').attr('action', url);
  });
});

$(document).ready(function(){
  $(".messagedelete").click(function(){
    var url=$(this).data('url');
    $('#messagedelete').attr('action', url);
  });
});

$(document).ready(function(){
  $(".busrequestdelete").click(function(){
    var url=$(this).data('url');
    $('#busrequestdelete').attr('action', url);
  });
});

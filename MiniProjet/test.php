<html>
 <head>
  <title>Live Bootstrap 4 Table Row Reorder with PHP using Ajax jQuery</title>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
 </head>
 <body>
  <br />
  <br />
  <div class="container">
   <h3 align="center">Live Bootstrap 4 Table Row Reorder with PHP using Ajax jQuery</h3>
   <br />
   <div class="card">
    <div class="card-header">Live Table Row Reorder</div>
    <div class="card-body">
     <div class="table-resposive">
      <table class="table table-striped table-bordered">
       <thead style="cursor: ">
        <tr>
         <th>Post Name</th>
         <th>Post Order</th>
        </tr>
       </thead>
       <tbody style="cursor: all-scroll;"></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:'fetch_data'},
   dataType:'json',
   success:function(data)
   {
    var html = '';
    for(var count = 0; count < data.length; count++)
    {
     html += '<tr id="'+data[count].page_id+'">';
     html += '<td>'+data[count].page_title+'</td>';
     html += '<td>'+data[count].page_order+'</td>';
     html += '</tr>';
    }
    $('tbody').html(html);
   }
  })
 }

 $('tbody').sortable({
  placeholder : "ui-state-highlight",
  update : function(event, ui)
  {
   var page_id_array = new Array();
   $('tbody tr').each(function(){
    page_id_array.push($(this).attr('id'));
   });

   $.ajax({
    url:"action.php",
    method:"POST",
    data:{page_id_array:page_id_array, action:'update'},
    success:function()
    {
     load_data();
    }
   })
  }
 });

});
</script>

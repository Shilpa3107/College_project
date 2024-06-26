<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Simple auto-suggest example using php, jquery and mysql</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <style>
  .ui-autocomplete-loading {
    background: white url(img/ui-anim_basic_16x16.gif) right center no-repeat;
  }
  </style>
</head>
<body>
<h3>Simple auto-suggest example using php, jquery and mysql</h3>
	<div class="ui-widget">
  <input type="text" id="country" name="country" placeholder="Type country name." width="40%">
</div>
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
   $( "#country" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "request.php",
          dataType: "json",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
      	    // do something on select event
        console.log(ui.item); // ui.item is  responded json from server
      },
      open: function() {
                 // D0 something on open event.
      },
      close: function() {
               // Do omething on close event
      }
    });
  });
  </script>
</body>
</html>
// Attach a submit handler to the form


jQuery( document ).on("submit", "form.reply", function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
 
  // Get some values from elements on the page:
	var $form = jQuery( this );
    var parent = $form.find( "input[name='parent']" ).val();
	var replycontent = $form.find( "textarea[name='replycontent']" ).val();
    var url = $form.attr( "action" );
 
  // Send the data using post
  var posting = jQuery.post( url, { replyto: parent,  replytext: replycontent,  url: url } );
 
  // Put the results in a div
  posting.done(function( data ) {
	$form.find( "textarea[name='replycontent']" ).val('');
	console.log(data);
	
	//jQuery($form).parents('.user').append('<div class="user"><div style="float:right; margin:1%;"></div><div class="user-pic"><a href="#"><img src="PROFILEPIC" alt="" /></a><h5>USERNAME</h5></div><div class="user-details"><p style="padding:1%;">'+replycontent+'</p></div><form class="reply" action="ajaxadd.php"><input type="hidden" name = "parent" value = "PARENT" ><textarea class="form-control" rows="1" name="replycontent"> </textarea><button type="submit" class="btn btn-default">Reply</button></form><div class="clearfix"></div></div>');
    jQuery($form).parent('.user').append(data);
	jQuery($form).parent('.user').find("abbr.timeago").timeago();
  
  });
});


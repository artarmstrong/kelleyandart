<script>

$(function() {
	
	$("#message_success").hide();
	$("#message_error").hide();
  $("#input_submit").click(function() {

	  $("#message_success").hide();
	  $("#message_error").hide();
		
	  var name = $("#input_name").val();
		var email = $("#input_email").val();
		var message = $("#input_message").val();
		
		if( (name == null || name == "") || (email == null || email == "") || (message == null || message == "") ){
			
			$("#message_error").show();
			return false;
			
		}else{
		
			var dataString = 'name='+ name + '&email=' + email + '&message=' + message;
			$.ajax({
	      type: "POST",
	      url: "assets/php/form-contact.php",
	      data: dataString,
	      success: function() {
	        $("#message_success").show();
	      }
	     });
	    return false;
	 }
	    
	});
});

</script>

<div id="overlay-contact" class="overlay grid-8">
    
    <div class="overlay-header"><a href="#" class="close" onclick="$.fancybox.close(); return false;">Close</a>
        <h1>Contact Us</h1>
    </div><!-- .overlay-header -->
    
        
    <form class="horizontal wrapped" method="post">
        <fieldset class="overlay-content">
        		
        		<div class="group success" id="message_success">
        			<p style="margin:0;"><strong>Your message has been sent!</strong></p>
        		</div>
        		
        		<div class="group error" id="message_error">
        			<p style="margin:0;"><strong>Please fill out all fields.</strong></p>
        		</div>
        
            <div class="group">
                <div class="group-key">
                    <label for="input_name">Your Name *</label>
                </div>
                <div class="group-value">
                    <input type="text" name="input_name" id="input_name" class="input-fluid">
                </div>
            </div><!-- .group -->
            
            <div class="group">
                <div class="group-key">
                    <label for="input_email">Email Address *</label>
                </div>
                <div class="group-value">
                    <input type="text" name="input_email" id="input_email" class="input-fluid">
                </div>
            </div><!-- .group -->
            
            <div class="group">
                <div class="group-key">
                    <label for="input_message">Message *</label>
                </div>
                <div class="group-value">
                    <textarea name="input_message" id="input_message" class="textarea-huge" rows="6"></textarea>
                </div>
            </div>
            
            <div class="group group-action">
                <div class="group-value">
                    <button type="submit" id="input_submit" class="btn btn-yellowOrange">Submit Message</button>
                    <button class="btn btn" onclick="$.fancybox.close(); return false;">Cancel</button>
                </div>
            </div><!-- .group -->
            
        </fieldset>
    </form>
        
        
</div><!-- .overlay -->
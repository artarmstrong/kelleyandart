<script>

$(function() {
	
    $("#message_success").hide();
	$("#message_error").hide();
	
	$("#input_submit").click(function() {
  
        $("#message_success").hide();
        $("#message_error").hide();
        
        var name = $("#input_name").val();
        var email = $("#input_email").val();
        var guests = $("#input_guests").val();
        
        if( (name == null || name == "") || (email == null || email == "") || (guests == null || guests == "") ){
        	
        	$("#message_error").show();
        	return false;
        	
        }else{
        
        	var dataString = 'name='+ name + '&email=' + email + '&guests=' + guests;
        	$.ajax({
                type: "POST",
                url: "assets/php/form-rsvp.php",
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

<div id="overlay-rsvp" class="overlay grid-8">
    
    <div class="overlay-header"><a href="#" class="close" onclick="$.fancybox.close(); return false;">Close</a>
        <h1>RSVP</h1>
        <small>We are accepting RSVP's until March 31, 2013</small>
    </div><!-- .overlay-header -->
    
    <form class="horizontal wrapped" method="post">
        <fieldset class="overlay-content">
            
            <?php if( strtotime("3/31/2013") > strtotime("now") ) { ?>
            
            <div class="group success" id="message_success">
            	<p style="margin:0;"><strong>Your RSVP has been sent!</strong></p>
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
                    <label for="input_guests">Total Guests *</label>
                </div>
                <div class="group-value">
            		<select name="input_guests" id="input_guests" class="select-mini">
            		    <option value="">--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <small>Guests including yourself</small>
                </div>
            </div><!-- .group -->
            
            <div class="group group-action">
                <div class="group-value">
                    <button type="submit" id="input_submit" class="btn btn-yellowOrange">Submit RSVP</button>
                    <button class="btn btn" onclick="$.fancybox.close(); return false;">Cancel</button>
                </div>
            </div><!-- .group -->
            
            <?php }else{ ?>
        
            <div class="group">
                <div style="margin-left: 15px; margin-right: 15px;">
                <p>We have stopped accepting RSVP's for the wedding. Please contact <a href="mailto:me@artarmstrong.com">Art</a> with any questions.</p>
                </div>
            </div><!-- .group -->
        
            <?php } ?>
            
        </fieldset>
    </form>
        
</div><!-- .overlay -->
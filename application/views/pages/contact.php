<div id="tooplate_main">    
    <div id="tooplate_content">
            <h2>Contact Information</h2>
        <p><em>In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris.</em></p>
        <p>Nam et tellus libero. Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor. Validate <a href="#" rel="nofollow"><strong>XHTML</strong></a> and <a href="#" rel="nofollow"><strong>CSS</strong></a>.</p>
        <div class="cleaner_h40"></div>
        <div class="two_column_ws float_l">
           		<h6>Location One</h6>
                225-880 Quisque odio quam, <br />
                Pulvinar sit amet convallis eget, 10110<br />
                Venenatis ut turpis<br /><br />
                Tel: 020-050-5520<br /> 
                Fax: 020-040-1680
                </div>
                <div class="two_column_ws float_r">
                <h6>Location Two</h6>
                161-832 Duis lacinia dictum, <br />
                Ipsum vestibulum, 10510<br />
                Diam a mollis tempor<br /><br />
                Tel: 040-060-4520<br />
                Fax: 040-020-3560 
            </div>       
            <div class="cleaner_h50"></div>
            <div id="contact_form">
				<h4>Quick Contact Form</h4>
					<form name="contactform" id="contactform" >
						<label for="author">Name:</label> 
                        <input type="text" id="author" name="author"/>
						<div class="cleaner_h10"></div>
													
						<label for="email">Email:</label> 
                        <input type="email" name="email" id="email"/>
						<div class="cleaner_h10"></div>
											
						<label for="subject">Subject:</label> 
                        <input type="text" name="subject" id="subject"/>
						<div class="cleaner_h10"></div>
							
						<label for="text">Message:</label> 
                        <textarea id="message" name="message" rows="0" cols="0"></textarea>
						<div class="cleaner_h10"></div>				
												
						<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
					</form>
                    <!-- <form class="cmxform" id="commentForm" method="get" action="">
                        <fieldset>
                        <legend>Please provide your name, email address (won't be published) and a comment</legend>
                        <p>
                        <label for="cname">Name (required, at least 2 characters)</label>
                        <input id="cname" name="name" minlength="2" type="text" required>
                        </p>
                        <p>
                        <label for="cemail">E-Mail (required)</label>
                        <input id="cemail" type="email" name="email" required>
                        </p>
                        <p>
                        <label for="curl">URL (optional)</label>
                        <input id="curl" type="url" name="url">
                        </p>
                        <p>
                        <label for="ccomment">Your comment (required)</label>
                        <textarea id="ccomment" name="comment" required></textarea>
                        </p>
                        <p>
                        <input class="submit" type="submit" value="Submit">
                        </p>
                      </fieldset>
                    </form> -->

			</div>           
    </div>
<!-- <script src = "<?php //echo PUB.'plugins/jquery_validation/lib/jquery-3.1.1.js' ?>" /> -->
<script src = "<?php echo PUB.'plugins/jquery_validation/dist/jquery.validate.min.js' ?>">
</script>
<script>
$(function(){
    $("#contactform").validate({
        rules: {
            author: {
                required: true,
            },
            email:{
                required: true,
                email: true
            },
            subject:{
                required: true,
            },
            message:{
                required: true,
            },

        },
        messages: {
            author: {
                required: 'Please enter author name'
            },
            email: {
                required: 'Please enter email'
                // email: 'please enter <em>valid</em> email address'
            },
            subject: {
                required: 'Please enter subject'
            },
            message: {
                required: 'Please enter message'
            }
        }
    });
})

</script>
<script>
// $("#commentForm").validate();
</script>
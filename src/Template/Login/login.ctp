<div class="loginMain">  

	<div class="loginSub">

		<div class="loginSubUpper">
			<h2 class="loginSubUpperHeading">Login</h2>
			<label class="loginSubUpperLabel">Lorem Ipsum is simply dummy text of the printing and</label><br>
			<label class="loginSubUpperLabel">typesetting industry</label>
		</div>  <!-- loginSubUpper div -->

		<div class="loginSubUpperContainer"> 

			 <form role="form" id="loginForm" method="post" action="Login/search">

                    <div class="form-group formEmail">

                    	    <label for="Login[email]" class="formLabel">Email:</label>

                            <input type="text" name="Login[email]" placeholder="Email" class="form-control insideLoginEmail" required>

                    </div>

                    <div class="form-group formPass">

                    	    <label for="Login[password]" class="formLabelPass">Password:</label>
                    	    
                            <input type="text"  name="Login[password]" class="form-control insideLoginPassword" placeholder="Password" required>

                    </div>

                        <!-- action="Postsupdate/addInquiry" onclick="echo $form->create('Post', array('action' => 'Postsupdate/addInquiry'));"-->

                    <button type="submit" class="btn btn-primary insideLoginSubmit"> Submit </button>

            </form>

		</div>

	</div> <!-- loginSub Div-->

</div> <!-- loginMain Div-->
	<div class="copyright" style="background:#2A2A2A;border-top:1px solid #000; font-size: 14px;">
	    <div class="container">
	        <div class="row" style="padding-top: 20px;">
	            <div class="col-md-3">                      
	                <div class="footerItemHeader">Menu</div>
	                <ul style="font-size:14px;">
		        		<li><a href="index.php">Home</a></li>
		        		<li><a href="carList.php">Listing Cars</a></li>
		        		<?php if( EC_isLogin() && EC_getCurrentType() != "A" ){?>
		        			<li><a href="addCar.php">Add Car</a></li>
		        		<?php } ?>
		        		<li><a href="contactUs.php">Contact Us</a></li>
		        		<li><a href="aboutUs.php">About Us</a></li>
		        		<?php if( EC_isLogin() && EC_getCurrentType() == "A" ){?>
		        			<li><a href="userMgrList.php">Management</a></li>
		        		<?php } ?>
	                </ul>
	            </div>
	            <div class="col-md-3">                      
	                <div class="footerItemHeader">Map</div>
	                <iframe width="260" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Downingtown,+PA&amp;aq=1&amp;oq=down&amp;sll=41.117935,-77.604698&amp;sspn=6.818691,15.864258&amp;ie=UTF8&amp;hq=&amp;hnear=Downingtown,+Chester,+Pennsylvania&amp;t=m&amp;ll=40.006514,-75.703268&amp;spn=0.013149,0.018797&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
	            </div>
	            <div class="col-md-3">                      
	                <div class="footerItemHeader">Contact Us</div>
	                <p><i class="icon-envelope"></i>&nbsp;support@autoselectcars.com</p>
	                <p><i class="icon-phone"></i>&nbsp;Service: (123) 456-7890</p>
	                <p><i class="icon-phone"></i>&nbsp;Sales: (123) 456-7890</p>
	            </div>	            
	            <div class="col-md-3">                      
	                <div class="footerItemHeader">About Us</div>
	                <p>
	                This is the description of this site.
	                Hope to fill beautiful descriptions here.
	                We are always ready for you.
	                We are car dealer company.
	                Thank you.
	                </p>
	            </div>
	            <div class="clearboth"></div>
	        </div>
	        <div class="row" style="border-top:2px solid #4a4a4a; padding-top: 30px; padding-bottom: 10px; margin-top:20px;">    
	            <div class="col-md-6">
	            	<p><i class="icon-map-marker"></i>&nbsp;2800 Corby Ave, Santa Rosa, CA 95407</p>
	            </div>
	            <div class="col-md-6">
	            	<p class="floatright">Copyright By &copy; AutoSelect 2014</p>
	            </div>	            
	            <div class="clearboth"></div>
	        </div>
	    </div> 
	</div>	
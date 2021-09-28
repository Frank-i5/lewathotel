<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>404</title>

		<script type="text/javascript">
			//<![CDATA[
				$(document).ready(function() {
					$().introtzikas({
							line: 'white', 
							speedwidth: 2000, 
							speedheight: 1000, 
							bg: '#474747',
							lineheight: 2
					});	
				});
			//]]>
		</script>
</head>

<body>

	<div class="bg_overlay"></div><!-- Pattern -->
	
		<div id="wrap">
			<div id="block">
				<div id="content">
					<div class="top_img">
						<div class="img_eror"></div>
					</div>
					<div class="srch">
						
					</div>
					<div class="text_eror">
						<h1>"Ooops! Page not found..."</h1>
						<p>Maybe you'll find the page you're looking for by  <br />
						    returning at <a href="http://localhost/brief_ci/index.php/Administration">HOME</a>.</p>
					</div>
					
					
				</div>
			</div>
		</div>

</body>
</html>
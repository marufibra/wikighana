<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

				include($_SERVER['DOCUMENT_ROOT']."/include/news_top.php");
				include($_SERVER['DOCUMENT_ROOT']."/include/header.php");
				include($_SERVER['DOCUMENT_ROOT']."/include/news_body.php");
				require_once($_SERVER['DOCUMENT_ROOT']."/include/comment.php");
				?>
				


			</div>

				<?php 
				
				include($_SERVER['DOCUMENT_ROOT']."/include/news_structure_sidebar.php");
				include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
				
				
				?>
		</div>
	</body>
<html>
<script src="/js/comment.js"></script>


<script>
$(document).ready(function(){

	$(document).on('click','.subscribe', function(){
		$.ajax({
			url:"/include/subscribe.php",
			method:"POST",
			dataType:"JSON",
			success:function(data){
				$(".subscribe_response").html(data.output);
				
			}
		})
	})

});
</script>
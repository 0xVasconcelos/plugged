<?php
if(empty($auth)) {
    header("location:/index.php"); 
    die();
}

echo ""."<script>var y='';</script>";

	
?>
<!-- Right (content) side -->
			<section class="content-block" role="main">
			
				<!-- Widget container -->
				<div class="widgets-container">
				
			<!-- Widget box -->
					<div class="widget alert fade in increase">
						
						<span>increase</span>
						<p><strong><?php echo $PositiveVideoCount;?><sup></sup></strong>legais</p>
					</div>
					<!-- /Widget box -->
					
					<!-- Widget box -->
					<div class="widget alert fade in decrease">
						
						<span>decrease</span>
						<p><strong><?php echo $NegativeVideoCount;?><sup></sup></strong>chatos</p>
					</div>
					<!-- /Widget box -->
										
					<!-- Widget box -->
					<div class="widget alert fade in add">
						
						<span>add</span>
						<p><strong><?php echo $CuratesVideoCount;?><sup></sup></strong>vídeos adicionados</p>
					</div>
					<!-- /Widget box -->

					<!-- Widget Box -->
					<div class="widget alert fade in text-only">
						
						<p><strong><?php echo $PlayVideoCount;?></strong>execuções</p>
					</div>
					<!-- /Widget box -->

					<!-- Widget Box -->
					<div class="widget alert fade in text-only">
						
						<p><strong><?php echo $PlayedVideoCount;?></strong>vídeos únicos tocados</p>
					</div>
					<!-- /Widget box -->

					<!-- Widget Box -->
					<div class="widget alert fade in text-only">
						
						<p><strong><?php echo $DJCount;?></strong>dj's já tocaram aqui</p>
					</div>
					<!-- /Widget box -->	
					
					
					
					
					
				</div>
				<!-- /Widget container -->
				
				
				<!-- Example alert -->
				<div class="alert alert-danger">
					<button class="close" type="button" data-dismiss="alert">×</button>
					<strong>Programação atual:</strong> 00:00 ~ 23:59  - Tema Livre
				</div>
				<!-- /Example alert -->
				
							
				
				<!-- Grid row -->
				<div class="row-fluid">		
				</div>
				<!-- /Grid row -->

				

				<!-- Grid row -->
				<div class="row-fluid">

					<!-- Data block -->
					
					<!-- /Data block -->
					

					
<?php 
error_reporting(0);

if(!$_GET['s']){

	MorePlayedList();
}
else {

	if ($_GET['s']=="l"){ 
		MorePositiveList();
	}
	elseif ($_GET['s']=="m") { 
		MoreNegativeList();		
	}
	elseif ($_GET['s']=="c") { 
		MoreCuratesList();		
	}
	elseif ($_GET['s']=="dl"){ 
		MorePositiveDJList();
	}
	elseif ($_GET['s']=="dm") { 
		MoreNegativeDJList();		
	}
	elseif ($_GET['s']=="dc") { 
		MoreCuratesDJList();		
	}
	elseif ($_GET['s']=="d") { 
		MorePlayedDJList();		
	}
	elseif ($_GET['s']=="el") { 
		MorePositiveUniqueList();		
	}
	elseif ($_GET['s']=="ec") { 
		MoreCuratesUniqueList();		
	}
	elseif ($_GET['s']=="em") { 
		MoreNegativeUniqueList();		
	}
	else { 
		MorePlayedList();
	}	
}
?>
								

				</div>
					
					
			
			</section>
			<!-- /Right (content) side -->
			
		</div>
		<!-- /Main page container -->
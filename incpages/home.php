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
			<tbody>
				<h2><span class="awe-signal"></span> Estatísticas da sala</h2></tbody>
				
					

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
				
				<!-- Page header -->
				<article class="page-header">
					<h1><span class="awe-bolt"></span>  ♫ BALADA DOS VIRJS ♫</h1>
					<p class="lead">#Aqui as informações sobre a page#<br>
Link da sala: <a href="http://plug.dj/baladadadp/">plug.dj/baladadadp/</a>  <br>
Twitter: http://twitter.com <br>
Facebok: http://facebook.com<br>


</p>
				</article>
				<!-- /Page header -->
				
				<!-- Grid row -->
				<div class="row-fluid">		
				</div>
				<!-- /Grid row -->

				

				<!-- Grid row -->
				<div class="row-fluid">

					<!-- Data block -->
					
					<!-- /Data block -->
					

					<table class="table table-bordered table-hover">

								<thead>
									<tr>
										<th>Título</th>
										<th>Tocado por</th>
										<th><span class='label label-success'>Legal</span></th>
										<th><span class="label label-info">Add</span></th>
										<th><span class='label label-important'>Chato</span></th>
										<th>Horário | DJ's online</th>

									</tr>
								</thead>
								<tbody>
								<h2><span class="awe-star"></span> Últimas tocadas</h2>
<?php GetLastPlayed(); ?>
								</tbody>
							</table>

				</div>
					
				
			
			
			</section>
			<!-- /Right (content) side -->
			
		</div>
		<!-- /Main page container -->
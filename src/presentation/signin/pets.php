<!DOCTYPE html>
<html>
	<head>
		<?php
			session_start();

			$id = $_SESSION["id_usuario"];

			$db = new PDO('mysql:host=localhost;dbname=pets', 'root', '');
			$stmt = $db->prepare("SELECT * FROM pets WHERE user_id = $id");

			if(!$stmt->execute()){
			    echo '<pre>';
			    print_r($stmt->errorInfo());
			}

		?>
		<title>Adote. - adoção de animais</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" 
	    rel="stylesheet" id="bootstrap-css">
	    <style type="text/css">
	    	.circle-image {
		      display: inline-block;
		      border-radius: 50%;
		      overflow: hidden;
		      width: 110px;
		      height: 110px;
		    }
	    	.circle-image img {
		      width: 100%;
		      height: 100%;
		      object-fit:cover;
		    }
	    </style>
	    <link
	      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
	      rel="stylesheet"
	      type="text/css"
	    />
	    <script
	      src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
	      crossorigin="anonymous"
	    ></script>
	</head>
	<body>
	    <div class="container">
	    	<div class="row">
	        	<div class="col-xs-6 .col-sm-4">
	          		<div class="panel">
	            		<div class="painel-heading">
	              			<h1>Pets</h1>
	            		</div>
	            		<div class="panel-body">
		                 	<?php
		                 		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		                 		$photo = $row['photo']; 
		                	?>
	                  		<table class="table table-user-information">
	                    		<tbody>
	                      			<tr>
	                      				<?php
									    	echo "<span class = 'circle-image'>
									            <img src='$photo'/></span><br/><br/>";
									    ?>
	                        			<td>Nome</td>
	                        			<td>Descrição</td>
	                        			<td>Tipo</td>
	                      			</tr> 
	                      			<tr>
						  				<td>
									    	<?php
									     		echo "" . $row['name'] . "<br>";?>
									   </td>
						   				<td>
									    	<?php
				                        		echo "" . $row['description'] . "<br>";?>
				                     	</td>
	                     				<td>
				                     		<?php
												echo "" . $row['type'] . "<br>";?>
										</td>
	                      	 		</tr>
	                      	 		<?php
	                      				}
	                      			?>
	                    		</tbody>
							 </table>
							 <a class="link" href="./data.php">
							<i class="fas fa-arrow-left"></i>
							Voltar
							</a>
						</div>
	          		</div>
	        	</div>
	   		</div>
		</div>
	</body>
</html>
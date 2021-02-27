<?php 
  require_once "./verifica.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			#session_start();

			$id = $_SESSION["id_usuario"];

			$db = new PDO('mysql:host=localhost;dbname=pets', 'root', '');
			$stmt = $db->prepare("SELECT name, birthdate, email, address FROM users WHERE id = $id");

			if(!$stmt->execute()){
			    echo '<pre>';
			    print_r($stmt->errorInfo());
			}

			$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
		?>
		
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" 
		 rel="stylesheet" id="bootstrap-css">
		 <link href="../css/global.css" rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
            rel="stylesheet"
            type="text/css"
        />
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script language=javascript type="text/javascript">
			$(document).ready(function(){
				$("#submit").on("click", function(){
					$("#dialog").dialog();
				});
		});
		</script>
		<title>Perfil do usuário</title>
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
		    .img{
		      height:320px;
		      width: 320px;
		      float: left;
		    }
		    .border{
		      border: 2px solid #d6d6c2;
		    }
		    .circle-image-user img{
		      display: inline-block;
		      border-radius: 50%;
		      overflow: hidden;
		      width: 320px;
		      height: 320px;
	  		  position: relative;
	  		  object-fit:cover;
		    }
		    .btn-pet{
		    	background-color: black;
		    	color: white;
		    }
		    .mg{
		    	display: flex;
		    	float: left;
		    }
		    .mg2{
	 			margin-left: 5px;
	 			margin-right: 5px;
	    	}
	   </style>
	</head>
	<body>	

	    <div class="container">
	      	<div class="row">

	        	<div class="col-xs-6 .col-sm-4">
	           		<div class="panel">
	            		<div class="painel-heading">
						<h1><?php echo "Bem-vindo(a) " . $_SESSION["nome_usuario"] . "!<BR>\n"; ?></h1>
	            		</div>
						</br>
	            		<div class="panel-body">
	              			<div class="row">
	                			<div class="col-md-6 col-lg-7" align="center">
		                			<?php

										$db = new PDO('mysql:host=localhost;dbname=pets', 'root', '');
										$stmt = $db->prepare("SELECT photo FROM users WHERE id = $id");

										if(!$stmt->execute()){
										    echo '<pre>';
										    print_r($stmt->errorInfo());
										}

								        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
								           $photo = $row['photo']; 
								            echo "<span class = 'circle-image-user'>
								            		<img src='$photo'/></span><br/><br/>";
								        }

									?>
	                			</div>
	                			<div class=" col-md-9 col-lg-9"> 
	                  				<table class="table table-user-information">
	                    				<tbody>
		                      				<tr>
		                        				<td>Nome</td>
		                        				<td>Data de Nascimento</td>
		                        				<td>Email</td>
		                        				<td>Endereço</td>
		                      				</tr> 
		                      				<tr>
						                      	<?php
						                      		foreach ($resultado as $value) {
						                      	?>
						                      		<td>
						                      			<?php 
						                      				echo "$value ";
						                      			 ?>
						                      		</td>
						                      		<?php
						        					}
						                      	  ?>
		                      				</tr>
		                    			</tbody>
		                  			</table>
		                		</div>
		              		</div>
		                  	<a href="../editUser/editUser.php" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                        <i class="glyphicon glyphicon-edit"></i> Editar </a>
		                  	<a href="../../controllers/DeleteUserRouter.php" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger">
		                  	<i class="glyphicon glyphicon-remove"></i> Excluir conta </a>
							<a href="./exit.php" type="button" data-toggle="tooltip" class="btn btn-sm btn-danger"> 
							<i class="glyphicon glyphicon-off"></i> Sair </a>
							<a href="../../../relatorio/relatorio.php" type="button" data-toggle="tooltip" class="btn btn-sm btn-danger">
							<i></i> Registros de adoções</a>
		            	</div>
		          	</div>
	        	</div>
	        
	        	<div class="col-xs-6 .col-sm-4">
	            	<div class="pet">
	            		<div class="painel-heading">
	              			<h1> Pets </h1><br/>
	            		</div>
	            		<img src="img/pata.png" class="img">
	            	</div>
	          		<div class="mg">
	          			<div class="mg2">
	          				<a href="pets.php" type="button" class=" btn btn-pet">Meus Pets</a>
	          			</div>
	          			<div class="mg2">
	          				<a href="../registerPet/index.php" type="button" class="btn btn-pet">Cadastrar Pet</a>
	          			</div>
	          			<div class="mg2">
	          				<a href="../listPets/" type="button" class="btn btn-pet">Adotar</a>
	          			</div>
                  <div class="mg2">
	          				<a href="../editPet/selectEditionPet.php" type="button" class="btn btn-pet">Editar pet</a>
	          			</div>
                  <div class="mg2">
	          				<a href="../deletePet/deletePet.php" type="button" class="btn btn-pet">Excluir pet</a>
	          			</div>
				  <div class="mg2">
				  			<input id="submit" type="submit" value="Tipo mais adotado"class="btn btn-pet"/>
	          			</div>
					
				 <div id="dialog" title="Animal mais adotado" style="display:none;">
				<p>
				<?php 
				$db = new PDO('mysql:host=localhost;dbname=pets', 'root', '');
				$query = "SELECT type , COUNT(*) AS numero FROM pets , records WHERE records.pet_id = pets.id GROUP BY type ORDER BY COUNT(*) DESC";
				$stmt = $db->prepare($query);
				$stmt->execute();
				$data = $stmt->fetchAll(PDO:: FETCH_OBJ);
				if($data[0]->type = 'dog'){
					echo 'Cachorro com : '. $data[0]->numero.' Adoções';
				}elseif($data[0]->type = 'cat'){
					echo 'Gato com : '. $data[0]->numero .' Adoções';
				}else{
					echo 'Pássaro com : '. $data[0]->numero . 'Adoções';
				}
				
				?>
				</p>
				     </div>
	            	</div>
	        	</div>

	        </div>
		</div>
	</body>
</html>

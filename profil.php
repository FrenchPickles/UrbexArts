<?php  

	require 'header.php';

	if (isset($_SESSION['userId'])) {

?>

	<main>
		<div class="container mt-5 mb-5">

			<?php

				// Création de la connexion à la bdd
				require "includes/dbh.inc.php";

				// Requête SQL
				$sql = "SELECT * FROM user, rank, image_user WHERE user.rank = rank.id AND user.image = image_user.id AND user.id = '{$_SESSION['userId']}'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					
					// Envoi des données par ligne
					$row = $result->fetch_assoc();

					?>

					<div class="row">

						<!-- Card profil -->
						<div class="col-lg-4 col-md-5">
							<div class="card mt-4">
								<img class="card-img-top" src="https://media.istockphoto.com/photos/triangular-abstract-background-picture-id624878906?k=6&m=624878906&s=612x612&w=0&h=uDcbe038RdtiiHchahAbwOYfx0bkPVLfsn0NOjA0gTM=">
							    <div class="content">
							    	<div class="author text-center">
							    		<img class="avatar border-white" src=<?php echo $row["image_user"] ?> >
			                            <h4 class="title"><?php echo $row["pseudo"] ?></h4>
			                            <?php echo'<a href="http://www.instagram.com/'.$row['instagram'].'"><small><i class="fab fa-instagram"></i>' ?>
			                            	<?php 

			                            	if (empty($row['instagram'])) {
												echo 'Aucun compte renseigné';
											} else {
												echo $row["instagram"];
											}

			                            	?></small></a>
			                        </div>
			                    </div>
							    <p class="card-text"><?php echo $row["description"] ?></p>
							</div>
						</div>

						<!-- Profil data -->
			            <div class="col-lg-8 col-md-7">
			            	<div class="card mt-4 p-3">

			            		<h4 class="title"><i class="fas fa-user-cog"></i> Modifier mes informations</h4>

			                    <div class="content">
			                        <form action="includes/profil.inc.php" method="post">
			                            <div class="row">
			                                <div class="col-md-4">
			                                    <div class="form-group">
			                                        <label for="uid">Pseudo</label>
			                                        <input type="text" id="uid" name="uid" class="form-control" placeholder="Pseudo" value=<?php echo $row["pseudo"] ?>>
			                                        <span class="required">*Champ obligatoire</span>
			                                    </div>
			                                </div>

			                                <div class="col-md-8">
			                                    <div class="form-group">
			                                        <label for="mail">Email</label>
			                                        <input type="email" id="mail" name="mail" class="form-control border-input" placeholder="E-mail" value=<?php echo $row["email"] ?>>
			                                        <span class="required">*Champ obligatoire</span>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="row">
			                                <div class="col-md-6">
			                                    <div class="form-group">
			                                        <label for="name">Nom</label>
			                                        <input type="text" id="name" name="name" class="form-control border-input" placeholder="Nom" value=<?php echo $row["name"] ?>>
			                                    </div>
			                                </div>
			                                <div class="col-md-6">
			                                    <div class="form-group">
			                                        <label for="firstname">Prénom</label>
			                                        <input type="text" id="firstname" name="firstname" class="form-control border-input" placeholder="Prénom" value=<?php echo $row["firstname"] ?>>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="row">
			                            	<div class="col-md-12">
			                                    <div class="form-group">
				                                    <label for="instagram">Compte Instagram</label>
				                            		<div class="input-group">
				                            			<div class="input-group-prepend">
				                            				<div class="input-group-text">https://www.instagram.com/</div>
				                            			</div>
				                            			<input type="text" id="instagram" name="instagram" class="form-control" placeholder="Compte Instagram" value=<?php echo $row["instagram"] ?>>
				                            		</div>
			                            		</div>
			                            	</div>
			                            </div>

			                            <div class="row">
			                                <div class="col-md-12">
			                                    <div class="form-group">
			                                        <label for="description">A propos</label>
			                                        <textarea rows="5" id="description" name="description" class="form-control border-input" placeholder="Votre description"><?php echo $row["description"] ?></textarea>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="row">
			                            	<div class="col-md-12 text-center mb-3">
			                            		<a href= <?php echo "includes/delete_account.inc.php?iduser=".$_SESSION['userId'] ?> class="unscribetxt"><i class="fas fa-trash-alt"></i> Suppression du compte</a>
			                            	</div>
			                            </div>

			                            <div class="text-center">
			                            	<button type="submit" class="btn btn-warning" name="modify-submit"><i class="fas fa-check"></i> Modifier</button>
			                            	<button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> Annuler</button>
			                            </div>
			                        </form>
			                    </div>
			                </div>
			            </div>
					</div>

					<?php
				}

			?>

			<?php

				// Requête SQL
				$sql = "SELECT * FROM user, rank WHERE user.rank = rank.id AND user.id = '{$_SESSION['userId']}'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					
					// Envoi des données par ligne
					$row = $result->fetch_assoc();

					if ($row['right_write'] == "1") {

			?>

						<div class="row">
							<div class="col-md-12">

								<div class="card mt-4">
									<h5 class="card-header"><i class="fas fa-newspaper"></i> Ajout d'un nouvel article</h5>

								  	<div class="card-body">
										<form action="includes/new_item.inc.php" method="post" enctype="multipart/form-data">
											<div class="form-row">
										    	<div class="form-group col-md-12">
										      		<label for="item_name">Nom</label>
										      		<input type="text" class="form-control" id="item_name" name="item_name" placeholder="Nom">
										    	</div>
										  	</div>

										  	<div class="form-group">
										    	<label for="short_desc">Description courte</label>
										    	<input type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Petite description: max 30 caractères">
										  	</div>

										  	<div class="form-group">
										    	<label for="desc">Description</label>
										    	<textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Description de l'article"></textarea>
										  	</div>

										  	<div class="form-group">
										  		<label for="type">Choix du type</label>
										      	<select class="form-control" id='type' name='type'>
										      		<?php  
														// Requête SQL
														$sql = "SELECT title FROM type";

														$result = $conn->query($sql);

														if ($result->num_rows > 0) {

					    									while($row = $result->fetch_assoc()) {
																echo "<option>".$row['title']."</option>";
															}
														}
										      		?>
												</select>
										  	</div>

										  	<div class="form-group">
										    	<label for="item_image">Image</label>
										    	<input type="text" class="form-control" id="item_image" name="item_image" placeholder="URL de l'image"></textarea>
										  	</div>

										  	<div class="form-group">
										    	<label for="item_imagetitle">Titre de l'image</label>
										    	<input type="text" class="form-control" id="item_imagetitle" name="item_imagetitle" placeholder="Titre de l'image"></textarea>
										  	</div>

										  	<div class="form-group">
										    	<label for="item_imagedesc">Description de l'image</label>
										    	<input type="text" class="form-control" id="item_imagedesc" name="item_imagedesc" placeholder="Petite description de l'image"></textarea>
										  	</div>	

											<button type="submit" class="btn btn-warning" name="add-submit"><i class="fas fa-check"></i> Valider</button>
			                            	<button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> Annuler</button>
										</form>
								  </div>
								</div>
								
							</div>
						</div>

			<?php
					}
				}

					// Requête SQL
					$sql = "SELECT * FROM user, rank WHERE user.rank = rank.id AND user.id = '{$_SESSION['userId']}'";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					
						// Envoi des données par ligne
						$row = $result->fetch_assoc();

						if ($row['right_admin'] == "1") {
			?>

							<div class="container mt-5">

								<h2 class="display-4">Liste des utilisateurs</h2>
								<div class="bar mb-3"></div>

								<table id="user_table" class="table table-responsive-md table-striped table-hover mt-3" width="100%">
								  <thead>
								    <tr>
								      <th class="th-sm">Pseudo</th>
								      <th class="th-sm">E-mail</th>
								      <th class="th-sm">Nom</th>
								      <th class="th-sm">Prénom</th>
								      <th class="th-sm">Grade</th>
								      <th class="th-sm">Actions</th>
								    </tr>
								  </thead>
								  <tbody>

								  	<?php  

									  	// Requête SQL
										$sql = "SELECT user.id, user.pseudo, user.email, user.name, user.firstname, rank.title FROM user, rank WHERE user.rank = rank.id";

										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
										
											// Envoi des données par ligne
											while($row = $result->fetch_assoc()) {
												echo "<tr>";
													echo "<td>".$row['pseudo']."</td>";
													echo "<td>".$row['email']."</td>";
													echo "<td>".$row['name']."</td>";
													echo "<td>".$row['firstname']."</td>";
													echo "<td>".$row['title']."</td>";

													echo "<td>";

													if ($row['title'] == "Membre") {
													
														echo "<a href='includes/delete_user.inc.php?iduser=".$row['id']."' class='btn btn-danger'><i class='fas fa-times-circle'></i></a> ";

														echo "<a href='includes/upgrade.inc.php?iduser=".$row['id']."' class='btn btn-success'><i class='fas fa-arrow-circle-up'></i></a>";
													}

													echo "</td>";

												echo "</tr>";
											}
										}
								  	?>

								  </tbody>
								</table>
							</div>

				<?php  

					}
				}

				$conn->close();

				?>

		</div>
	</main>

<?php  

	require 'footer.php';

	} else {		
		header("Location: index.php");
		exit();	
	}
?>
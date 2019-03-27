	<?php
		$query = $_SERVER['PHP_SELF'];
		$path = pathinfo( $query );
		$filename = $path['basename'];
		
		if ($filename == "footer.php"){
			header("Location: ./");
			exit();
		}
	?>
	<!-- NEWSLETTERS -->
	<section class="container-fluid bg-mygrey section-newsletter">
		<div class="row">
	        <div class="col-md-12">
	    		<div class="thumbnail center well well-sm text-center mt-4 mb-4">
	                <h2 class="display-4">Newsletter</h2>
	                
	                <p>S'inscrire et recevoir les nouveaux articles par e-mail :</p>
	                
	                <form action="" method="post" role="form">
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fas fa-paper-plane"></i></span>
						  </div>
						  <input type="text" class="form-control" placeholder="Votre e-mail" aria-label="Username" aria-describedby="basic-addon1">
						  <input type="button" class="btn btn-outline-dark rounded-0" name="" value="Valider">
						</div>
	              </form>

	            </div>    
	        </div>
		</div>
	</section>

	<!-- FOOTER -->
	<footer class="container-fluid bg-mydark">

		<!-- Social bar -->
		<div class="row footer-social pt-4">
			<div class="col-sm text-center">
				<a href="https://www.instagram.com/steven.fr.dlt/">
					<span class="fab fa-instagram"></span>
				</a>
				<p>Rejoins nous sur instagram</p>
			</div>
		</div>

		<!-- Button list -->
		<div class="row text-center">
			<div class="col-md-12 mb-3">
				<a class="btn btn-outline-secondary mt-2" href="urbex"><i class="fas fa-house-damage"></i> Urbex</a>
				<a class="btn btn-outline-secondary mt-2" href="souterrains"><i class="fas fa-dungeon"></i> Souterrains</a>
				<a class="btn btn-outline-secondary mt-2" href="http://map.urbexarts.fr"><i class="fas fa-map-marker-alt"></i> Carte collaborative <span class="badge badge-secondary">Beta</span></a>
			</div>
		</div>

		<!-- Brand logo -->
		<div class="row text-center">
			<div class="col-md-12">
				<a href="./">
					<img src="assets/images/logo-urbexarts-white.png" class="urbexarts-logo" alt="logo" height="50">
				</a>
			</div>
		</div>

		<!-- Copyright -->
		<div class="row text-center copyright">
			<div class="col-md-12">
				<p>©2018 - URBEXARTS.fr Tous droits réservés</p>
			</div>
			<div class="col-md-12">
				<p>Toute copie totale ou partielle de ce site est interdite | <i class="fas fa-campground"></i> Made by <a href="http://www.stevendouillet.com">steven douillet</a></p>
			</div>
		</div>


	</footer>

	<!-- Importations JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

	<script type="text/javascript">
		$(document).ready( function () {
		    $('#user_table').DataTable({
        		"language": {
				    "sProcessing":     "Traitement en cours...",
				    "sSearch":         "Rechercher&nbsp;:",
				    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
				    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
				    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				    "sInfoPostFix":    "",
				    "sLoadingRecords": "Chargement en cours...",
				    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
				    "oPaginate": {
				        "sFirst":      "Premier",
				        "sPrevious":   "Pr&eacute;c&eacute;dent",
				        "sNext":       "Suivant",
				        "sLast":       "Dernier"
				    },
				    "oAria": {
				        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
				        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
				    },
				    "select": {
				            "rows": {
				                _: "%d lignes séléctionnées",
				                0: "Aucune ligne séléctionnée",
				                1: "1 ligne séléctionnée"
				            } 
				    }
				}
				});

		    $('#like_table').DataTable({
        		"language": {
				    "sProcessing":     "Traitement en cours...",
				    "sSearch":         "Rechercher&nbsp;:",
				    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
				    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
				    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				    "sInfoPostFix":    "",
				    "sLoadingRecords": "Chargement en cours...",
				    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
				    "oPaginate": {
				        "sFirst":      "Premier",
				        "sPrevious":   "Pr&eacute;c&eacute;dent",
				        "sNext":       "Suivant",
				        "sLast":       "Dernier"
				    },
				    "oAria": {
				        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
				        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
				    },
				    "select": {
				            "rows": {
				                _: "%d lignes séléctionnées",
				                0: "Aucune ligne séléctionnée",
				                1: "1 ligne séléctionnée"
				            } 
				    }
				}
    		});
		});
	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		
		function cant_delete_admin() {
			swal ( "Euh nonn !" ,  "Il est impossible de supprimer un compte administrateur" ,  "error" )
		}
		function cant_delete_writer() {
			swal ( "Euh nonn !" ,  "Il est impossible de supprimer un compte rédacteur" ,  "error" )
		}
		function delete_user() {
			swal ( "Supression effectué !" ,  "Le compte a été supprimé avec succès" ,  "success" )
		}
		function data_user_success() {
			swal ( "Modification(s) terminée(s) !" ,  "Vos informations ont été mises à jour" ,  "success" )
		}
		function data_newitem_success() {
			swal ( "Article ajouté !" ,  "L'article a été mis en ligne avec succès" ,  "success" )
		}
		function emptyfields() {
			swal ( "Champ(s) manquant(s) !" ,  "Un ou plusieurs champs sont vides !" ,  "error" )
		}
		function invalidemail() {
			swal ( "E-mail invalide !" ,  "L'E-mail saisi est incorrect, utilisez la syntaxe suivante: exemple@host.com !" ,  "error" )
		}
		function invalidusername() {
			swal ( "Nom d'utilisateur invalide !" ,  "Le nom d'utilisateur saisi est invalide !" ,  "error" )
		}
		function passwordcheck() {
			swal ( "Mot de passe incorrect !" ,  "Les deux mots de passe ne correspondent pas !" ,  "error" )
		}
		function usertaken() {
			swal ( "Nom d'utilisateur existant !" ,  "Le nom d'utilisateur est déjà pris !" ,  "error" )
		}
		function logout() {
			swal ( "Déconnexion réussi !" ,  "Vous avez été déconnecté" ,  "success" )
		}
		function login_success() {
			swal ( "Connexion réussi !" ,  "Vous êtes désormais connecté" ,  "success" )
		}
		function login_fail_user() {
			swal ( "Connexion refusé !" ,  "Le nom d'utilisateur n'existe pas" ,  "error" )
		}
		function login_fail_pwd() {
			swal ( "Connexion refusé !" ,  "Le mot de passe est incorrect" ,  "error" )
		}
		function login_fail_emptyfields() {
			swal ( "Connexion refusé !" ,  "Certains champs sont vides" ,  "error" )
		}
		function login_fail_sqlerror() {
			swal ( "Connexion refusé !" ,  "Erreur SQL" ,  "error" )
		}
		function signup() {
			swal ( "Inscription réussi !" ,  "Vous êtes maintenant inscrit, vous pouvez désormais vous connecter" ,  "success" )
		}
		function upgrade_admin() {
			swal ( "Upgrade impossible !" ,  "Veuillez contacter un administrateur" ,  "error" )
		}
		function upgrade_writer() {
			swal ( "Upgrade impossible !" ,  "Veuillez contacter un administrateur" ,  "error" )
		}
		function upgrade_success() {
			swal ( "Upgrade réussi !" ,  "L'utilisateur a été promu !" ,  "success" )
		}
	</script>
	<?php

	/*SIGNUP*/
	if (isset($_GET['signup']) AND $_GET['signup'] == "success") {
		echo "<script>signup();</script>";
	}

	/*LOGIN*/
	if (isset($_GET['login']) AND $_GET['login'] == "success") {
		echo "<script>login_success();</script>";
	}
	if (isset($_GET['error']) AND $_GET['error'] == "nouser") {
		echo "<script>login_fail_user();</script>";
	}
	if (isset($_GET['error']) AND $_GET['error'] == "wrongpassword") {
		echo "<script>login_fail_pwd();</script>";
	}
	if (isset($_GET['error']) AND $_GET['error'] == "emptyfields") {
		echo "<script>login_fail_emptyfields();</script>";
	}

	/*LOGOUT*/
	if (isset($_GET['state']) AND $_GET['state'] == "logout") {
		echo "<script>logout();</script>";
	}

	/*SQL ERROR*/
	if (isset($_GET['error']) AND $_GET['error'] == "sqlerror") {
		echo "<script>login_fail_sqlerror();</script>";
	}

	/*DELETE ACCOUNT*/
	if (isset($_GET['error']) AND $_GET['error'] == "cant_delete_admin") {
		echo "<script>cant_delete_admin();</script>";
	}
	if (isset($_GET['error']) AND $_GET['error'] == "cant_delete_writer") {
		echo "<script>cant_delete_writer();</script>";
	}
	if (isset($_GET['profil']) AND $_GET['profil'] == "deleted") {
		echo "<script>delete_user();</script>";
	}
	if (isset($_GET['profil']) AND $_GET['profil'] == "deletesuccessfully") {
		echo "<script>delete_user();</script>";
	}

	/*NEW ITEM*/
	if (isset($_GET['profil']) AND $_GET['profil'] == "success") {
		echo "<script>data_newitem_success();</script>";
	}

	/*INVALID EMAIL*/
	if (isset($_GET['error']) AND $_GET['error'] == "invalidmailuid") {
		echo "<script>invalidemail();</script>";
	}

	/*INVALID USERNAME*/
	if (isset($_GET['error']) AND $_GET['error'] == "invalidmailuid") {
		echo "<script>invalidusername();</script>";
	}

	/*PASSWORD CHECK*/
	if (isset($_GET['error']) AND $_GET['error'] == "passwordcheck") {
		echo "<script>passwordcheck();</script>";
	}

	/*USER TAKEN*/
	if (isset($_GET['error']) AND $_GET['error'] == "usertaken") {
		echo "<script>usertaken();</script>";
	}

	/*UPGRADE*/
	if (isset($_GET['error']) AND $_GET['error'] == "cant_upgrade_admin") {
		echo "<script>upgrade_admin();</script>";
	}
	if (isset($_GET['error']) AND $_GET['error'] == "cant_upgrade_writer") {
		echo "<script>upgrade_writer();</script>";
	}
	if (isset($_GET['profil']) AND $_GET['profil'] == "upgradesuccessfully") {
		echo "<script>upgrade_success();</script>";
	}

	?>
</body>
</html>
		<section>
			<div id="entete-formulaire">
				<div class="logo-acceuil-container">
				 	<span class="logo-inscription">MY CINEMA</span>
				</div><br>
			</div>

			<!-- FORMULAIRE -->
			<div id="formulaire-container">
				<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" class="forminscription">
					<table id="Formtable">
						<!-- CIVILITE -->
							<tr>
								<td class="Sexe">
									<span id="err-mess1" class="err-mess err-nom-prenom"></i></span><br>
									<label for="Madame" class="labeltable madame-monsieur">Madame</label>
									<input type="radio" name="Sexe" value="Madame"  id="Madame">
									<label for="Monsieur" class="labeltable madame-monsieur">Monsieur</label>
									<input type="radio" name="Sexe" value="Monsieur" id="Monsieur">
								</td>
							</tr>
							<!-- Nom/prenom -->
							<tr>
								<td class="nomprenom">
									<span id="err-mess2" class="err-mess err-nom-prenom"></span><br>
									<label for="Nom" class="titlenom labeltable">Nom :</label><br/>
									<input type="text" name="Nom"  id="Nom" placeholder="Votre nom..." value="<?php if (isset($_POST['Nom'])) {echo $_POST['Nom'];} ?>" />
								</td>
								<td class="nomprenom">
									<span id="err-mess3" class="err-mess err-nom-prenom"></span></br>
									<label for="Prenom" class="titleprenom labeltable">Prenom :</label><br>
									<input type="text" name="Prenom"  id="Prenom" placeholder="Votre prenom..." value="<?php if (isset($_POST['Prenom'])) {echo $_POST['Prenom'];} ?>" />
								</td>
							</tr>
							<!-- Surnom -->
							<tr class="Surnom-container" >
								<td>
									<span id="err-mess4" class="err-mess"></span><br>
									<label for="Surnom" class="labeltable">Votre pseudo:</label><br/>
									<input type="text" name="Surnom" class="Input" id="Surnom" placeholder="Surnom famillial/pseudo..." value="<?php if (isset($_POST['Prenom'])) {echo $_POST['Prenom'];} ?>" />
								</td>
							</tr>
							<!-- Date de naissance -->
							<tr>
								<td class="DateNaissance">
										<span id="err-mess5" class="err-mess"><i class="fas fa-times-circle"></i></span><br>
										<label class="labeltable">Date de naissance:</label></br>
										<select name="annee" class="selector annee" id='n_annee'>
												<option value="">Année</option>
												<?php for ($i=1; $i<=118; $i++) {
													$ans=2018-$i;
													?><option value='<?php echo  $ans ;?>'><?php echo $ans ;?></option><?php
												} ?>
										</select>
										<select name="mois" class="selector mois" id='n_mois'>
												<option value="">Mois</option>
											    <option value="01">Janvier</option>
											    <option value="02">Février</option>
											    <option value="03">Mars</option>
											    <option value="04">Avril</option>
											    <option value="05">Mai</option>
											    <option value="06">Juin</option>
											    <option value="07">Juillet</option>
											    <option value="08">Aout</option>
											    <option value="09">Septembre</option>
											    <option value="10">Octobre</option>
											    <option value="11">Novembre</option>
											    <option value="12">Decembre</option>
										</select>
										<select name="jour" class="selector jour" id='n_jour'>
											    <option value="">Jour</option>
											    <?php for ($i=1; $i<=31; $i++) {
													$jour=$i;
												?><option value='<?php echo  $jour ;?>'><?php echo $jour ;?></option><?php
												} ?>
										</select>
								</td>
							</tr>
							<!-- adresse email/confirmation adresse mail-->
							<tr>
								<td class="Email">
									<?php if (isset($Reqdb4->errmess6)) {echo $Reqdb4->errmess6;} ?>
									<label for="Email" class="labeltable">Email :</label><br/>
									<input type="email" name="email" class="Input" id="Email" placeholder="Entrez votre email..." value="<?php if (isset($_POST['email'])) {echo $_POST['email'];} ?>" />
								</td>
							</tr>
							<!-- Confirmation adresse mail-->
							<tr class="ConfEmail" class="labeltable" >
								<td>
									<span id="err-mess7" class="err-mess"><i class="fas fa-times-circle"></i><?php if(isset($Reqdb4->err_mail)){echo $Reqdb4->err_mail;} ?>;</span><br>
									<label for="ConfEmail" class="labeltable">Confirmation de l'email :</label><br/>
									<input type="email" name="ConfEmail" class="Input" id="ConfEmail" placeholder="Confirmez votre email..." value="<?php if (isset($_POST['ConfEmail'])) {echo $_POST['ConfEmail'];} ?>" />
								</td>
							</tr>
							<!-- Abonnement -->
							<tr >
								<td>
									<span id="err-mess16" class="err-mess">
									</span><br>
									<select name="abo" class="selector secret" id="abonnement">
										<option value="">ABONNEMENT</option>
										<option value="1">ABONNEMENT</option>
									</select>
								</td>
							</tr>
							<!-- Mots de passe-->
							<tr class="Mdp" >
								<td>
									<span id="err-mess8" class="err-mess"><i class="fas fa-times-circle"></i></span><br>
									<label for="Mdp" class="labeltable">Mots de passe:</label><br/>
									<input type="password" name="password" class="Input" id="Mdp"   placeholder="Entrez votre mots de passe..."/>
								</td>
							</tr>
							<!-- Confirmation  Mots de passe-->
							<tr class="ConfMdp" >
								<td>
									<span id="err-mess9" class="err-mess"><i class="fas fa-times-circle"></i></span><br>
									<label for="ConfMdp" class="labeltable">Confirmation du mots de passe :</label><br/>
									<input type="password" name="ConfMdp" class="Input" id="ConfMdp" placeholder="Confirmez votre mots de passe..."  />
								</td>
							</tr>
							<!-- Adresse postal-->
							<tr class="Adresse" >
								<td class="no_rue-card">
									<span id="err-mess10" class="err-mess"><i class="fas fa-times-circle"></i></span><br>
									<label for="Numerorue" id="N°" class="titlenorue labeltable">N°:</label><br/>
									<input type="number" name="No_rue" id="Numerorue" placeholder="N°" value="<?php if (isset($_POST['No_rue'])) {echo $_POST['No_rue'];} ?>" />
								</td>
								<td class="no_rue-card">
									<br>
									<label for="cardinaux" id="card-label">Bis*...:</label><br/>
									<input type="text" name="Card_rue" id="cardinaux" placeholder="Ter/Bis/Quater..." value="<?php if (isset($_POST['Card_rue'])) {echo $_POST['Card_rue'];} ?>" />
								</td>
								<td>
									<br>
									<label for= "Nomrue" class="titlenomrue labeltable">Nom de rue:</label><br/>
									<input type="text" name="Nom_rue" id="Nomrue" placeholder="Nom de la voie..." value="<?php if (isset($_POST['Nom_rue'])) {echo $_POST['Nom_rue'];} ?>" />
								</td>
							</tr>
							<!-- Ville-->
							<tr class="Ville">
								<td>
									<span id="err-mess11" class="err-mess"><i class="fas fa-times-circle"></i></span><br>
									<label for="Ville" class="labeltable labelville">Ville:</label><br/>
									<input type="text"  name="Ville" class="Input" id="Ville" placeholder="Commune..." value="<?php if (isset($_POST['Ville'])) {echo $_POST['Ville'];} ?>" />
								</td>
							</tr>
							<!-- Code postale-->
							<tr class="CP">
								<td>
									<span id="err-mess12" class="err-mess"><i class="fas fa-times-circle"></i></span><br>
									<label for="CP" class="labeltable">Code postal:</label><br/>
									<input type="number" name="CP" class="Input" placeholder="Exemple:75000" id="CP" value="<?php if (isset($_POST['CP'])) {echo $_POST['CP'];} ?>" />
								</td>
							</tr>
							<!-- Numero de telephone-->
							<tr class="Numtel">
								<td>
									<span id="err-mess13" class="err-mess"><i class="fas fa-times-circle"></i></span><br>
									<label for="numerotel" class="labeltable">Numero de la telephone:</label><br/>
									<input type="number" name="No_tel1" class="Input_num" placeholder="06" id="tel1" value="<?php if (isset($_POST['No_tel1'])) {echo $_POST['No_tel1'];} ?>"/>
									<input type="number" name="No_tel2" class="Input_num" id="tel2" placeholder="XX" value="<?php if (isset($_POST['No_tel2'])) {echo $_POST['No_tel2'];} ?>" />
									<input type="number" name="No_tel3" class="Input_num" id="tel3" placeholder="XX" value="<?php if (isset($_POST['No_tel3'])) {echo $_POST['No_tel3'];} ?>"/>
									<input type="number" name="No_tel4" class="Input_num" id="tel4" placeholder="XX" value="<?php if (isset($_POST['No_tel4'])) {echo $_POST['No_tel4'];} ?>"/>
									<input type="number" name="No_tel5" class="Input_num" id="tel5" placeholder="XX" value="<?php if (isset($_POST['No_tel5'])) {echo $_POST['No_tel5'];} ?>"/>
								</td>
							</tr>

							<!-- Question secrete -->
							<tr >
								<td>
									<span id="err-mess14" class="err-mess">
									</span><br>
									<select name="q_secret" class="selector secret" id="secretQ">
										<option value="">Question secret</option>
										<option value="01">Quel est le nom votre premiere animal de compagnie ?</option>
										<option value="02">Quel est votre surnom ?</option>
										<option value="03">Quel est le prénom de votre meilleur amis ?</option>
										<option value="04">Quel est votre dessert preferers ?</option>
									</select>
								</td>
							</tr>
							<!-- Reponse secret  -->
							<tr>
								<td>
									<span id="err-mess15" class="err-mess">
									</span><br>
									<label for="Reponse_secret" class="labeltable">Reponse secrete:</label><br/>
									<input type="text" name="Reponse_secret" class="Input" id="Reponse_secret" placeholder="Entrée votre reponse secrete ..."/>
								</td>
							</tr>
					</table>
						<!-- Confirmation-->
					<div class="confirmed-container">
						<input type="submit" name="Confirmer" value="Confirmer" id="Confirmer" >
					</div>
				</form>
			</div>
		</section>

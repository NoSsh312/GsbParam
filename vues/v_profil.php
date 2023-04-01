<div class="tabs">
		<button class="tablinks" onclick="openTab(event, 'tab1')">Mes Commandes</button>
		<button class="tablinks" onclick="openTab(event, 'tab2')" id="defaultOpen">Mes Informations</button>
		<button class="tablinks" onclick="openTab(event, 'tab3')">Mes Avis</button>
	</div>

	<div id="tab1" class="tabcontent">
		<h2>Mes Commandes</h2>
		</br>
		<p>Contenu de l'onglet 1.</p>
	</div>

	<div id="tab2" class="tabcontent">
		<h2>Mes Informations</h2>
		</br>
		<p>Contenu de l'onglet 2.</p>
	</div>

	<div id="tab3" class="tabcontent">
		<h2>Mes Avis</h2>
		</br>
		<p>Contenu de l'onglet 3.</p>
	</div>

	<script>
		document.getElementById("defaultOpen").click();
		function openTab(evt, tabName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(tabName).style.display = "block";
			evt.currentTarget.className += " active";
		}
	</script>
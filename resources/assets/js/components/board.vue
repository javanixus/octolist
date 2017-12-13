<template lang="html">
  	<div id="board">
  		<div class="wrapper-siswa">
  			<div id="wrapper-siswa-vue">
  				<div class="popup">
  					<div class="popup__wrapper-task-add">
  						<div class="task-add borderRadius-s">
  							<div class="task-add__header padding-s">
  								<h4>Tambah task</h4>
  							</div>
  							<div class="task-add__content">
  								<form style="width: 100%; display: flex;">
  									<div class="task-add__content__form padding-s">
  										<p>Nama task</p><input class="input-text input-text--white" data-rules="required|email" placeholder="ex: Fix layout" type="text">
  										<p>Pilih gambar latar</p>
  										<div class="wrapper-selection-taskbg">
  											<div class="selection-taskbg padding-xxs">
  												<div class="color-badge color1"></div>
  												<div class="color-badge color2"></div>
  												<div class="color-badge color3"></div>
  											</div>
  										</div>
  									</div>
  									<div class="task-add__content__preview">
  										<div class="task-add-preview__header textAlignCenter">
  											<h4>Preview</h4>
  										</div>
  										<div class="task-add-preview__content">
  											<div class="task-item">
  												<div class="round">
  													<input id="checkbox-preview" name="" type="checkbox" value=""> <label for="checkbox-preview"></label>
  												</div><span class="truncate-text" id="task-title-preview"></span>
  												<div class="task-item__delete">
  													<svg class="feather feather-trash" height="16" viewbox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
  													<polyline points="3 6 5 6 21 6"></polyline>
  													<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
  												</div>
  											</div>
  											<div class="task-add-preview__content__buttonwrap">
  												<span id="cancel-add-task">batalkan</span> <button class="marginLeft-xs button button-landing button--l borderRadius-s button--melting-blue" type="submit">Buat task <!-- Buat task -->
  												 <!-- Add task  --></button>
  											</div>
  										</div>
  									</div>
  								</form>
  							</div>
  						</div>
  					</div>
  				</div><!-- end of popup teask , im sorry i mean task  -->
  				<!-- <div class="loading high-noon"></div> -->
  				<nav class="wrapper-navigation-siswa">
  					<div class="navigation-siswa">
  						<div class="navigation-siswa__topbar-left">
  							<ul>
  								<li>
  									<a href="#">Pesan</a>
  								</li>
  								<li>
  									<a href="#">Notifikasi</a>
  								</li>
  								<li>
  									<a href="#">Pengaturan</a>
  								</li>
  							</ul>
  						</div>
  						<div class="navigation-siswa__topbar-center">
  							<input autocomplete="off" class="navbar-searchbar input-nofill input-nofill--siswa input-text" name="" placeholder="Search" spellcheck="false" type="text" value="">
  						</div>
  						<div class="navigation-siswa__topbar-right">
  							<div class="profile-badge--siswa">
  								<span>Fahmi irsyad khairi</span>
  								<div class="avatar avatar--xs" id="avatar-dp-id"><img alt="" class="avatar-img" src="/resources/assets/images/avatar0.jpg"></div>
  							</div>
  						</div>
  					</div>
  				</nav>
  				<div class="wrapper-siswa-panel">
  					<aside class="siswa-panel">
  						<div class="siswa-panel__header">
  							<a href="dasboard.html">
  							<div class="siswa-panel--board-button look-up">
  								Kembali ke board
  							</div></a>
  							<div class="siswa-panel-title-project paddingTop-xl">
  								nama proyek
  								<h4 class="paddingTop-xs">Project Octolist</h4>
  								<p>Project ini mempunyai tujuan untuk mempermudah pengerjaan suatu planning dalam sebuah team.</p>
  							</div>
  						</div>
  						<div class="siswa-panel__content">
  							<div class="siswa-panel__content__tips">
  								<span>Fakta #1</span>
  								<p class="marginTop-xxs">Faktanya, kamu tidak bisa melihat apapun jika kamu buta.</p>
  							</div>
  							<div class="content__member marginTop-xs">
  								Team saya
  								<div class="wrapper-member-list">
  									<div class="member-list paddingTop-s">
  										<div class="marginRight-xs avatar avatar--xs member-img"><img alt="" class="avatar-img" src="/resources/assets/images/avatar0.jpg" title="Fahmi irsyad khairi"></div>
  										<div class="marginRight-xs avatar avatar--xs member-img" title="Cyntia P"><img alt="" class="avatar-img" src="/resources/assets/images/love.jpg"></div>
  										<div class="marginRight-xs member-add">
  											<svg class="Icon UserIcon Facepile-placeholderIcon" style="width: 12px; height: 12px; fill: white;" viewbox="0 0 32 32">
  											<path d="M20.534,16.765C23.203,15.204,25,12.315,25,9c0-4.971-4.029-9-9-9S7,4.029,7,9c0,3.315,1.797,6.204,4.466,7.765C5.962,18.651,2,23.857,2,30c0,0.681,0.065,1.345,0.159,2h27.682C29.935,31.345,30,30.681,30,30C30,23.857,26.038,18.651,20.534,16.765z M9,9c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7S9,12.86,9,9z M4,30c0-6.617,5.383-12,12-12s12,5.383,12,12H4z"></path></svg>
  										</div>
  										<div class="marginRight-xs member-add">
  											<svg class="Icon UserIcon Facepile-placeholderIcon" style="width: 12px; height: 12px; fill: white;" viewbox="0 0 32 32">
  											<path d="M20.534,16.765C23.203,15.204,25,12.315,25,9c0-4.971-4.029-9-9-9S7,4.029,7,9c0,3.315,1.797,6.204,4.466,7.765C5.962,18.651,2,23.857,2,30c0,0.681,0.065,1.345,0.159,2h27.682C29.935,31.345,30,30.681,30,30C30,23.857,26.038,18.651,20.534,16.765z M9,9c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7S9,12.86,9,9z M4,30c0-6.617,5.383-12,12-12s12,5.383,12,12H4z"></path></svg>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  					</aside>
  				</div>
  				<main class="wrapper-siswa-content">
  					<div class="siswa-content">
  						<nav class="siswa-content__navigation"></nav>
  						<aside class="wrapper-siswa-task">
  							<div class="siswa-task padding-s">
  								<div class="siswa-task__header">
  									<h4>Tasks list</h4>
  								</div>
  								<div class="siswa-task__content">
  									<div class="add-task-item look-up" id="add-task">
  										<span>Tambah Task</span>
  									</div>
  									<div id="task-item-sort">
  										<div class="task-item">
  											<div class="round">
  												<input class="checkbox" type="checkbox"> <label for=""></label>
  											</div><span class="truncate-text"></span>
  											<div class="task-item__delete">
  												<svg class="feather feather-trash" height="16" viewbox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
  												<polyline points="3 6 5 6 21 6"></polyline>
  												<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
  											</div>
  										</div>
  									</div>
  								</div>
  							</div>
  						</aside>
  						<div class="wrapper-siswa-main-content">
  							<div class="siswa-main-content">
  								<div class="siswa-button-header"></div>
  							</div>
  						</div>
  					</div>
  				</main>
  			</div>
  		</div>
  	</div>
</template>
<script>

</script>
<style lang="css">

</style>

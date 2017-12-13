<template lang="html">
  <div>
		<nav>
			<div class="navbar navbar--fixed">
				<div class="navbar__profile navbar__profile--profile-page">
					<a href="javascript:void(0)"><span>Octolist</span></a>
					<div class="navbar-searchbar">
						<input autocomplete="off" class="navbar-searchbar input-nofill input-text fontSize-s borderRadius-m" name="" placeholder="Search" spellcheck="false" type="text" value=""> <img alt="" src="/resources/assets/svg/search.svg" style="width: 20px; height: 20px; position: absolute;top: 12px;right: 12px;">
					</div>
					<div class="wrapper-profile right-menu">
						<div class="icon-bell marginTop-xs marginRight-s" id="message">
							<svg class="feather feather-message-circle" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
							<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
						</div>
						<div class="icon-message marginTop-xs marginRight-s" id="bell">
							<svg class="feather feather-bell" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
							<path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
						</div>
						<div class="profile-badge">
							<a href="javascript:void(0)">
							<div class="border-gradient">
								<div class="avatar avatar--s avatar-dp" id="avatar-dp-id"><img alt="" class="avatar-img" src="assets/img/avatar0.jpg"></div>
							</div></a>
						</div>
					</div>
				</div>
				<div class="component-profile margin-l" id="profile-popup-show">
					<div class="profile-popup borderRadius-s">
						<div class="profile-popup__cover">
							<div class="overlay-dark" style="display: block;"></div><img alt="" src="/resources/assets/images/avatar0.jpg">
							<div class="profile-popup__cover-title">
								<p class="fontWeight-6" style="color:white!important;">Fahmi Irsyad Khairi</p>
							</div>
						</div>
						<div class="profile-popup__content padding-m">
							<div class="profile-popup__content__items">
								<ul>
									<li>
										<a class="fontWeight-6" href="profile.html">Profile</a>
									</li>
									<li>
										<a class="fontWeight-6" href="javascript:void(0)">Settings</a>
									</li>
									<li>
										<a class="fontWeight-6" href="javascript:void(0)">Task</a>
									</li>
									<li>
										<a class="fontWeight-6" href="javascript:void(0)">Logout</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="component-notification margin-l" id="notification-popup-show">
					<div class="notification-popup borderRadius-s">
						<div class="notification-popup__header padding-m">
							<p class="fontWeight-6" style="font-family: Open Sans; color: #5d5b5b; margin: 0;">Notification</p>
						</div>
						<div class="notification-popup__content">
							<div class="notification-popup__items notification-popup__items--unread padding-xs paddingLeft-m">
								<div class="avatar avatar--m avatar--glow"><img alt="" class="avatar-img" src="assets/img/love.jpg"></div>
								<div class="notification-popup-desc marginLeft-s">
									<span class="fontSize-s"><span class="fontWeight-6">Cyntia pratita</span> mengomentari "i like all these pictures, the overall mood is perfect."<span class="fontSize-xs" style="color: #5d5b5b">&nbsp; - 4 jam yang lalu</span></span>
								</div>
							</div>
							<div class="notification-popup__items padding-xs paddingLeft-m">
								<div class="avatar avatar--m avatar--glow"><img alt="" class="avatar-img" src="/resources/assets/images/avatar0.jpg"></div>
								<div class="notification-popup-desc marginLeft-s">
									<span class="fontSize-s"><span class="fontWeight-6">Pampam</span> menambahkan jadwal pada card <span class="fontWeight-6">UI Concept</span><span class="fontSize-xs" style="color: #5d5b5b">&nbsp; - 2 menit yang lalu</span></span>
								</div>
							</div>
							<div class="notification-popup__items padding-xs paddingLeft-m">
								<div class="avatar avatar--m avatar--glow"><img alt="" class="avatar-img" src="/resources/assets/images/kecil6.jpg"></div>
								<div class="notification-popup-desc marginLeft-s">
									<span class="fontSize-s"><span class="fontWeight-6">Klarak Luis D</span> menyelesaikan card <span class="fontWeight-6">Database Relation</span>.<span class="fontSize-xs" style="color: #5d5b5b">&nbsp; - 15 menit yang lalu</span></span>
								</div>
							</div>
							<div class="notification-popup-button padding-xs textAlignCenter">
								<a href="javascript:void(0)"><span class="fontSize-s fontWeight-6" style="font-family: Open Sans;color: #5d5b5b;">Lihat semua</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="component-notification margin-l" id="message-popup-show">
					<div class="message-popup borderRadius-s">
						<div class="notification-popup__header padding-m">
							<p class="fontWeight-6" style="font-family: Open Sans; color: #5d5b5b; margin: 0;">Pesan Masuk</p>
						</div>
						<div class="notification-popup__content">
							<div class="notification-popup__items padding-xs paddingLeft-m">
								<div class="avatar avatar--m avatar--glow"><img alt="" class="avatar-img" src="/resources/assets/images/love.jpg"></div>
								<div class="notification-popup-desc marginLeft-s">
									<span class="fontSize-s"><span class="fontWeight-6">Cyntia pratita</span></span>
									<p class="fontSize-s"><span class="fontSize-xs" style="color: #5d5b5b">eh , yang ini di revisi yak :) . ada perubahan hehe , lagi males w.</span></p>
								</div>
							</div>
							<div class="notification-popup__items notification-popup__items--unread padding-xs paddingLeft-m">
								<div class="avatar avatar--m avatar--glow"><img alt="" class="avatar-img" src="/resources/assets/images/5.jpg"></div>
								<div class="notification-popup-desc marginLeft-s">
									<span class="fontSize-s"><span class="fontWeight-6">Steve G</span></span>
									<p class="fontSize-s"><span class="fontSize-xs" style="color: #5d5b5b">i've uploaded new concept on project, pls review it and tell me if u found an issu ...</span></p>
								</div>
							</div>
							<div class="notification-popup-button padding-xs textAlignCenter">
								<a href="javascript:void(0)"><span class="fontSize-s fontWeight-6" style="font-family: Open Sans;color: #5d5b5b;">Lihat semua</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="navbar-extended--profile">
					<div class="navbar-extended__item marginMagic">
						<a class="marginRight-s" href="#" style="color: #0f55eb;">Feed</a> <a class="marginRight-s" href="#">Activity</a> <a class="marginRight-s" href="#">Contribution</a>
					</div>
				</div>
			</div>
		</nav>
		<header>
			<div class="wrapper-profile-head">
				<div class="profile-head marginMagic">
					<div class="profile-head__avatar marginBottom-s">
						<div class="avatar avatar--xl avatar--glow marginMagic"><img alt="" class="avatar-img" src="/resources/assets/images/avatar0.jpg"></div>
					</div>
					<div class="profile-head__title">
						<h4 class="fontSize-l">Fahmi irsyad k</h4>
					</div>
					<div class="profile-head__quotes">
						<q cite="https://facebook.com" style="color: #6F6F6F;">semua bisa diraih kalau punya niat dan semangat</q>
					</div>
				</div>
				<div class="wrapper-profile-menu paddingBottom-l">
					<ul class="profile-menu marginMagic">
						<li class="profile-menu__items">
							<a href="#">Feed</a>
						</li>
						<li class="profile-menu__items">
							<a href="#">Activity</a>
						</li>
						<li class="profile-menu__items">
							<a href="#">Contribution</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<section style="height: 1000px;">
			<main>
				<div class="wrapper-feed padding-l" style="">
					<div class="feedpage">
						<!-- <div class="alert alert==primary">
              <a href="javascript:void()" class="alert-link">update sukses</a>
            </div>
            <div class="alert alert==danger">
              <span class="alert-text">perhatian , mohon untuk mengkonfirmasi email anda <span class="alert-link">fahmiirsyad10@gmail.com</span></span>
            </div>
            <div class="alert alert==warning">
              <span class="alert-text">ada sesuatu yang salah</span>
            </div> -->
						<div class="feed-items clearfix">
							<div class="feed-items__dp avatar avatar--m"><img alt="" class="avatar-img" src="/resources/assets/images/avatar0.jpg"></div>
							<div class="feed-items__content marginLeft-m borderRadius-s">
								<div class="feed-items__images"><img alt="" src="/resources/assets/images/background.jpg"></div>
								<div class="feed-items__desc padding-m">
									<div class="text-limit">
										<span>Update Link : https://google.com</span>
									</div>
								</div>
							</div>
						</div>
						<div class="feed-items clearfix">
							<div class="feed-items__dp avatar avatar--m"><img alt="" class="avatar-img" src="/resources/assets/images/avatar0.jpg"></div>
							<div class="feed-items__content marginLeft-m borderRadius-s">
								<div class="feed-items__images"><img alt="" src="/resources/assets/images/avatar0.jpg"></div>
								<div class="feed-items__desc padding-m">
									<div class="text-limit">
										<span>Update Link : https://google.com</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</section>
	</div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>

<template lang="html">
  <div>
			<div class="wrapper-profile-head">
				<div class="profile-head marginMagic">
					<div class="profile-head__avatar marginBottom-s">
						<div class="avatar avatar--xl avatar--glow marginMagic"><img class="avatar-img" v-lazy="imgObj" data-srcset="https://trello-attachments.s3.amazonaws.com/59eaf823376e9802e77847d6/300x365/d2ccb4e13ea060791c30c85dc16d8e65/tumblr_oxq71xgWFC1wa2pdlo1_500.gif"></div>
					</div>
					<div class="profile-head__title">
						<h4 class="fontSize-l">Fahmi irsyad k</h4>
					</div>
					<div class="profile-head__quotes">
						<q style="color: #6F6F6F;">semua bisa diraih kalau punya niat dan semangat</q>
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
		<section style="height: 1000px;">
			<main>
				<div class="wrapper-feed padding-l" style="">
					<div class="feedpage">
						<div class="feed-items clearfix">
							<div class="feed-items__dp avatar avatar--m"><img alt="" class="avatar-img" src="/images/avatar0.jpg"></div>
							<div class="feed-items__content marginLeft-m borderRadius-s">
								<div class="feed-items__images"><progressive-img :blur="30" alt="" placeholder="https://wallinsider.com/wp-content/uploads/2017/05/Himiko-Toga-Wallpapers-2.jpg" src="https://wallinsider.com/wp-content/uploads/2017/05/Himiko-Toga-Wallpapers-2.jpg"/></div>
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
								<div class="feed-items__images"><progressive-img :blur="30" alt="" placeholder="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/19748608_1233452060115955_4042941187335383999_n.jpg?_nc_eui2=v1%3AAeEmWWfVRhe974pFso2UV3breYtrHtIiPe-sdbdqgVccMHVRIO5RQD-Cv7ve249m2JPvTInL6LBE8B_EQK34IIX3gzc5Injntxpuwx92UOyzVQ&oh=38bee9731ad5b1cae6236bf7059e0c8b&oe=5AA825AA" src="https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/19748608_1233452060115955_4042941187335383999_n.jpg?_nc_eui2=v1%3AAeEmWWfVRhe974pFso2UV3breYtrHtIiPe-sdbdqgVccMHVRIO5RQD-Cv7ve249m2JPvTInL6LBE8B_EQK34IIX3gzc5Injntxpuwx92UOyzVQ&oh=38bee9731ad5b1cae6236bf7059e0c8b&oe=5AA825AA"/></div>
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
  data() {
    return {
      imgObj: {
        preLoad: 1.3,
        error: 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif',
        loading: 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif'
      },
      imgUrl: 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_loading.gif'
    }
  }
}
</script>

<style lang="css">
</style>

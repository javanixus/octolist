<template lang="html">
  <div id="dashboard-core">
    <div class="loading high-noon"></div>
    <div class="navbar">
      <div class="navbar__profile navbar__profile--profile-page">
        <a href="javascript:void(0)"><span>Octolist</span></a>
        <div class="navbar-searchbar">
          <input autocomplete="off" autocorrect="off" autocapitalize=
          "off" spellcheck="false" type="text" name="" value=""
          class="navbar-searchbar input-nofill input-text fontSize-s borderRadius-m"
          placeholder="Search" /> <img src="/resources/assets/svg/search.svg"
          style=
          "width: 20px; height: 20px; position: absolute;top: 12px;right: 12px;"
          alt="" />
        </div>
        <div class="wrapper-profile right-menu">
          <div id="message" class=
          "icon-bell marginTop-xs marginRight-s"></div>
          <div id="bell" class=
          "icon-message marginTop-xs marginRight-s"></div>
          <div class="profile-badge">
            <a href="javascript:void(0)"></a>
            <div class="border-gradient">
              <div id="avatar-dp-id" class=
              "avatar avatar--s avatar-dp">
                <img class="avatar-img" src="/resources/assets/images/avatar0.jpg"
                alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="popup" id="popup-task">
        <div class="popup__wrapper-task-add">
          <div class="task-add borderRadius-s">
            <div class="task-add__header padding-s">
              <h4>
                Tambah task
              </h4>
            </div>
            <div class="task-add__content">
              <div class="task-add__content__form padding-s">
                <p>
                  Nama task
                </p><input id="input-task-add" class=
                "input-text input-text--white" type="text" name=""
                value="" />
                <p>
                  Pilih gambar latar
                </p>
                <div class="wrapper-selection-taskbg">
                  <div class="selection-taskbg padding-xxs">
                    <div class="color-badge color1"></div>
                    <div class="color-badge color2"></div>
                    <div class="color-badge color3"></div>
                  </div>
                </div>
              </div>
              <div class="task-add__content__preview">
                <div class=
                "task-add-preview__header textAlignCenter">
                  <h4>
                    Preview
                  </h4>
                </div>
                <div class="task-add-preview__content">
                  <div class="task-item">
                    <div class="round">
                      <input type="checkbox" id="checkbox-preview"
                      name="" value="" />
                    </div><span>Fix layout</span>
                  </div>
                  <div class="task-add-preview__content__buttonwrap">
                    <span href="javascript:void(0)" id=
                    "cancel-add-task">batalkan</span> <button id=
                    "done-add-task" class=
                    "marginLeft-xs button button-landing button--l borderRadius-s button--melting-blue">
                    Buat task <!-- Buat task -->
                     <!-- Add task  --></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="profile-popup-show" class=
      "component-profile margin-l">
        <div class="profile-popup borderRadius-s">
          <div class="profile-popup__cover">
            <div class="overlay-dark" style="display: block;">
            </div><img src="/resources/assets/images/avatar0.jpg" alt="" />
            <div class="profile-popup__cover-title">
              <p class="fontWeight-6" style="color:white!important;">
                Fahmi Irsyad Khairi
              </p>
            </div>
          </div>
          <div class="profile-popup__content padding-m">
            <div class="profile-popup__content__items">
              <ul>
                <li>
                  <a href="profile.html" class=
                  "fontWeight-6">Profile</a>
                </li>
                <li>
                  <a href="javascript:void(0)" class=
                  "fontWeight-6">Settings</a>
                </li>
                <li>
                  <a href="javascript:void(0)" class=
                  "fontWeight-6">Task</a>
                </li>
                <li>
                  <a href="javascript:void(0)" class=
                  "fontWeight-6">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="notification-popup-show" class=
      "component-notification margin-l">
        <div class="notification-popup borderRadius-s">
          <div class="notification-popup__header padding-m">
            <p style=
            "font-family: Open Sans; color: #5d5b5b; margin: 0;"
            class="fontWeight-6">
              Notification
            </p>
          </div>
          <div class="notification-popup__content">
            <div class=
            "notification-popup__items notification-popup__items--unread padding-xs paddingLeft-m">
            <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="/resources/assets/images/love.jpg"
                alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                "fontWeight-6">Cyntia pratita</span> mengomentari "i
                like all these pictures, the overall mood is
                perfect."<span style="color: #5d5b5b" class=
                "fontSize-xs">&nbsp; - 4 jam yang lalu</span></span>
              </div>
            </div>
            <div class=
            "notification-popup__items padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="/resources/assets/images/avatar0.jpg"
                alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                "fontWeight-6">Pampam</span> menambahkan jadwal pada
                card <span class="fontWeight-6">UI
                Concept</span><span style="color: #5d5b5b" class=
                "fontSize-xs">&nbsp; - 2 menit yang
                lalu</span></span>
              </div>
            </div>
            <div class=
            "notification-popup__items padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="/resources/assets/images/kecil6.jpg"
                alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                "fontWeight-6">Klarak Luis D</span> menyelesaikan
                card <span class="fontWeight-6">Database
                Relation</span>.<span style="color: #5d5b5b" class=
                "fontSize-xs">&nbsp; - 15 menit yang
                lalu</span></span>
              </div>
            </div>
            <div class=
            "notification-popup-button padding-xs textAlignCenter">
              <a href="javascript:void(0)"><span class=
              "fontSize-s fontWeight-6" style=
              "font-family: Open Sans;color: #5d5b5b;">Lihat
              semua</span></a>
            </div>
          </div>
        </div>
      </div>
      <div id="message-popup-show" class=
      "component-notification margin-l">
        <div class="message-popup borderRadius-s">
          <div class="notification-popup__header padding-m">
            <p style=
            "font-family: Open Sans; color: #5d5b5b; margin: 0;"
            class="fontWeight-6">
              Pesan Masuk
            </p>
          </div>
          <div class="notification-popup__content">
            <div class=
            "notification-popup__items padding-xs paddingLeft-m">
              <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="/resources/assets/images/love.jpg"
                alt="" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                "fontWeight-6">Cyntia pratita</span></span>
                <p class="fontSize-s">
                  <span style="color: #5d5b5b" class="fontSize-xs">eh
                  , yang ini di revisi yak :) . ada perubahan hehe ,
                  lagi males w.</span>
                </p>
              </div>
            </div>
            <div class=
            "notification-popup__items notification-popup__items--unread padding-xs paddingLeft-m">
            <div class="avatar avatar--m avatar--glow">
                <img class="avatar-img" src="/resources/assets/images/5.jpg" alt=
                "" />
              </div>
              <div class="notification-popup-desc marginLeft-s">
                <span class="fontSize-s"><span class=
                "fontWeight-6">Steve G</span></span>
                <p class="fontSize-s">
                  <span style="color: #5d5b5b" class=
                  "fontSize-xs">i've uploaded new concept on project,
                  pls review it and tell me if u found an issu
                  ...</span>
                </p>
              </div>
            </div>
            <div class=
            "notification-popup-button padding-xs textAlignCenter">
              <a href="javascript:void(0)"><span class=
              "fontSize-s fontWeight-6" style=
              "font-family: Open Sans;color: #5d5b5b;">Lihat
              semua</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-extended">
        <div class="navbar-extended__item marginMagic">
          <a href="#" style="color: #0f55eb;" class=
          "marginRight-s">Feed</a> <a href="#" class=
          "marginRight-s">Activity</a> <a href="#" class=
          "marginRight-s">Contribution</a>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content__header">
        <div class="header-menu">
          <div class="header-menu__right paddingRight-xxl">
            <div id="add-task" style="max-width: 300px;" class=
            "button button-landing fontSize-s button--xl borderRadius-s button--melting-blue green-bg button-green">
            Buat Project Baru
            </div>
          </div>
        </div>
      </div>
      <div class="content__items">
        <div class="project">
          <div class="project__header marginTop-m">
            <span>4 Projects Showed</span>
          </div>
          <div class="project__content">
            <div class="project-item">
              <div class="project-item__header">
                <span class="overlay-dark"><a href=
                "javascript:void(0)"><img class="icon" src=
                "/resources/assets/svg/edit.svg" alt="" /></a></span> <img src=
                "/resources/assets/images/dragon-girl.png" alt="" />
              </div>
              <div class="project-item__content">
                <h5>
                  Typography Culture
                </h5>
                <div class="content-red">
                  <div class="content-desc">
                    <div class="content-people">
                      <img src="/resources/assets/images/kecil1.png" alt="" />
                      <img src="/resources/assets/images/kecil6.jpg" alt="" />
                      <img src="/resources/assets/images/kecil5.jpg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="project-item__footer">
                <div class="project-item__footer-items">
                  <span>Add people</span>
                </div>
                <div class="project-item__footer-items">
                  <span>Details</span>
                </div>
              </div>
            </div>
            <div class="project-item">
              <div class="project-item__header">
                <span class="overlay-dark"><a href=
                "javascript:void(0)"><img class="icon" src=
                "/resources/assets/svg/edit.svg" alt="" /></a></span> <img src=
                "/resources/assets/images/plants.png" alt="" />
              </div>
              <div class="project-item__content">
                <h5>
                  GradPlants Project
                </h5>
                <div class="content-red">
                  <div class="content-desc">
                    <div class="content-people">
                      <img src="/resources/assets/images/kecil1.png" alt="" />
                      <img src="/resources/assets/images/kecil6.jpg" alt="" />
                      <img src="/resources/assets/images/kecil5.jpg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="project-item__footer">
                <div class="project-item__footer-items">
                  <span>Add people</span>
                </div>
                <div class="project-item__footer-items">
                  <span>Details</span>
                </div>
              </div>
            </div>
            <div class="project-item">
              <div id="project-overlay" class=
              "project-item__overlay">
                <div class="project-item__overlay-header">
                  <div class="overlay-header__search">
                    <input class=
                    "search search--transparent input-text" type=
                    "text" name="" value="" /> <a href=
                    "javascript:void(0)"><span class="left" style=
                    "color: white;">suggest</span></a> <a href=
                    "javascript:void(0)"><span class=
                    "right">all</span></a>
                  </div>
                </div>
                <div class="project-item__overlay-content">
                  <div class="people-bar">
                    <div class="people-circle people-circle--big">
                      <img src="/resources/assets/images/avatar0.jpg" alt="" />
                    </div>
                    <div class="people-circle people-circle--medium">
                      <img src="/resources/assets/images/kecil1.png" alt="" />
                    </div>
                    <div class="people-circle people-circle--small">
                      <img src="/resources/assets/images/kecil5.jpg" alt="" />
                    </div>
                    <div class="people-circle people-circle--tiny">
                      <img src="/resources/assets/images/kecil1.png" alt="" />
                    </div>
                    <div class=
                    "people-circle people-circle--medium-2">
                      <img src="/resources/assets/images/love.png" alt="" />
                    </div>
                  </div>
                </div>
                <div class="project-item__overlay-footer">
                  <div id="overlay-close" class="button-transparent">
                    Close
                  </div>
                </div>
              </div>
              <div class="project-item__header">
                <span class="overlay-dark"><a href=
                "javascript:void(0)"><img class="icon" src=
                "/resources/assets/svg/edit.svg" alt="" /></a></span> <img src=
                "/resources/assets/svg/gradient1.svg" alt="" />
              </div>
              <div class="project-item__content">
                <h5>
                  Koplok Bingung W
                </h5>
                <div class="content-red">
                  <div class="content-desc">
                    <div class="content-people">
                      <img src="/resources/assets/images/kecil1.png" alt="" />
                      <img src="/resources/assets/images/kecil6.jpg" alt="" />
                      <img src="/resources/assets/images/kecil5.jpg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="project-item__footer">
                <div id="overlay-show" class=
                "project-item__footer-items">
                  <span>Add people</span>
                </div>
                <div class="project-item__footer-items">
                  <span>Details</span>
                </div>
              </div>
            </div>
            <div class="project-item">
              <div class="project-item__overlay">
                <div class="project-item__overlay-header">
                  <div class="overlay-header__search">
                    <input class=
                    "search search--transparent input-text" type=
                    "text" name="" value="" /> <a href=
                    "javascript:void(0)"><span class="left" style=
                    "color: white;">suggest</span></a> <a href=
                    "javascript:void(0)"><span class=
                    "right">all</span></a>
                  </div>
                </div>
                <div class="project-item__overlay-content">
                  <div class="people-bar">
                    <div class="people-circle people-circle--big">
                      <img src="/resources/assets/images/avatar0.jpg" alt="" />
                    </div>
                    <div class="people-circle people-circle--medium">
                      <img src="/resources/assets/images/kecil1.png" alt="" />
                    </div>
                    <div class="people-circle people-circle--small">
                      <img src="/resources/assets/images/kecil5.jpg" alt="" />
                    </div>
                    <div class="people-circle people-circle--tiny">
                      <img src="/resources/assets/images/kecil1.png" alt="" />
                    </div>
                    <div class=
                    "people-circle people-circle--medium-2">
                      <img src="/resources/assets/images/love.png" alt="" />
                    </div>
                  </div>
                </div>
                <div class="project-item__overlay-footer">
                  <div class="button-transparent">
                    Close
                  </div>
                </div>
              </div>
              <div class="overlay--item">
                <div class="project-item__header">
                  <span class="overlay-dark"><a href=
                  "javascript:void(0)"><img class="icon" src=
                  "/resources/assets/svg/edit.svg" alt="" /></a></span>
                  <img src="/resources/assets/images/prism.png" alt="" />
                </div>
                <div class="project-item__content">
                  <h5>
                    PRISM The CSS Framework
                  </h5>
                  <div class="content-red">
                    <div class="content-desc">
                      <div class="content-people">
                        <img src="/resources/assets/images/kecil1.png" alt="" />
                        <img src="/resources/assets/images/kecil6.jpg" alt="" />
                        <img src="/resources/assets/images/kecil5.jpg" alt="" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="project-item__footer">
                  <div class="project-item__footer-items">
                    <span>Add people</span>
                  </div>
                  <div class="project-item__footer-items">
                    <span>Details</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="project">
          <div class="project__header marginTop-m">
            <span>2 Projects Archived</span>
          </div>
          <div class="project__content">
            <div class="project-item">
              <div class="project-item__header--archived">
                <span class="overlay-dark"><a href=
                "javascript:void(0)"><img class="icon" src=
                "/resources/assets/svg/edit.svg" alt="" /></a></span> <img src=
                "/resources/assets/images/dragon-girl.png" alt="" />
              </div>
              <div class="project-item__content">
                <h5>
                  Typography Culture
                </h5>
                <div class="content-red"></div>
              </div>
              <div class="project-item__footer">
                <div class="project-item__footer-items">
                  <span>Add people</span>
                </div>`
                <div class="project-item__footer-items">
                  <span>Details</span>
                </div>
              </div>
            </div>
            <div class="project-item">
              <div class="project-item__header--archived">
                <span class="overlay-dark"><a href=
                "javascript:void(0)"><img class="icon" src=
                "/resources/assets/svg/edit.svg" alt="" /></a></span> <img src=
                "/resources/assets/images/plants.png" alt="" />
              </div>
              <div class="project-item__content">
                <h5>
                  GradPlants Project
                </h5>
                <div class="content-red"></div>
              </div>
              <div class="project-item__footer">
                <div class="project-item__footer-items">
                  <span>Add people</span>
                </div>
                <div class="project-item__footer-items">
                  <span>Details</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style lang="css" scoped>
</style>

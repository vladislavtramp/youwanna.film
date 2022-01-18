<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta property="og:url" content="http://themepixels.me/blockbox/templates" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Blockbox Responsive Multi-Purpose HTML5 Template" />
  <meta property="og:description" content="Truly a multi-purpose and responsive html5 template that covers almost all types of UI from landing, dashboard, admin, e-commerce, apps and more. See it for yourself." />
  <meta property="og:image" content="http://www.themepixels.me/blockbox/images/cover.jpg" />
  <link rel="icon" href="../images/favicon.ico">

  <title></title>

  <link href="/app/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="/app/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="/app/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

  <link href="/public/styles/blockbox.css" rel="stylesheet">
</head>

<body class="message-1 bg-superlight tx-size-14">

  <div class="leftpanel pos-fixed-left wd-260 l-neg-260 l-xl-0 bg-white">
    <div class="logopanel ht-100 d-flex align-items-center justify-content-center bg-primary">
      <a href="" class="tx-size-28 tx-poppins tx-semibold tx-spacing-neg-4 tx-white">
      </a>
    </div><!--logopanel -->
    <div class="input-group bd-b bd-color-gray-lightest">
      <input type="search" class="form-control tx-size-14 bd-0 pd-y-15 rounded-0" placeholder="">
      <span class="input-group-btn">
        <button class="btn bg-white pd-x-15 bd-0 rounded-0"><i class="fa fa-search tx-gray-light"></i></button>
      </span>
    </div><!-- input-group -->
    <div class="pd-y-30 pd-x-25">
      <h6 class="tx-size-10 tx-uppercase tx-spacing-2 tx-bold mg-b-25">Группы</h6>

      <div class="media-list">
        <div class="media align-items-center">
          <span class="iconwrap bg-primary icon-24 mg-r-20 rounded"><i class="fa fa-rocket tx-white"></i></span>
          <div class="media-body">
            <a href="" class="tx-bold tx-gray-dark">Беседы</a>
          </div>
        </div><!-- media -->
        <div class="media align-items-center mg-t-20">
          <span class="iconwrap bg-indigo icon-24 mg-r-20 rounded"><i class="fa fa-comments tx-white"></i></span>
          <div class="media-body">
            <a href="" class="tx-bold tx-gray-dark">Сообщения</a>
          </div>
        </div><!-- media -->
      </div><!-- media-list -->
    </div><!-- pd-30 -->
  </div><!-- leftpanel -->

  <div class="headpanel pd-y-35 bg-gray-dark tx-center pos-fixed t-0 ht-100 l-0 l-xl-260 r-0 r-lg-250">
    <div class="d-flex justify-content-between align-items-center pd-x-15 pd-lg-x-25">
      <div>
        <a href="" id="showLeftMenu" class="mg-r-20 bd pd-x-10 pd-y-5 tx-white op-2 hidden-xl-up"><i class="fa fa-navicon"></i></a>
        <h5 class="tx-size-base tx-size-md-20 d-inline-block tx-white tx-normal mg-b-0">Сообщения</h5>
      </div>
      <div>
        <a href="" class="tx-white op-1"><i class="icon ion-android-more-horizontal tx-size-24 lh-1"></i></a>
        <a href="" id="showRightMenu" class="mg-l-20 bd pd-x-10 pd-y-5 tx-white op-2 hidden-lg-up"><i class="fa fa-users"></i></a>
      </div>
    </div>
  </div><!-- headpanel -->

  <div id="mainPanel" class="mainpanel pos-fixed t-100 l-0 l-xl-260 r-0 r-lg-250 b-62 pd-15 pd-sm-25 overflow-y-auto">

      <? foreach ($messages as $message): ?>
        <? if ((int)$user['id'] === (int)$message['user_send_id']): ?>
            <div class="d-flex justify-content-between mt-4">
              <div class="media wd-90p">
                <img src="<?= $user['image_profile']?>" class="wd-36 rounded-circle mg-r-15 mg-t-5" alt="">
                <div class="media-body bg-white pd-20">
                  <div class="d-sm-flex justify-content-between align-items-center mg-b-15">
                    <div class="tx-bold tx-inverse"><?= $user['login']?></div>
                    <div class="tx-size-12"><?= date('H:i', strtotime($message['created_at']))?></div>
                  </div>
                  <p class="mg-b-0"><?= $message['message']?></p>
                </div><!-- media-body -->
              </div><!-- media -->
              <a href="" class="tx-inverse op-1"><i class="icon ion-android-more-horizontal tx-size-18 lh-1"></i></a>
            </div><!-- d-flex -->
            <? elseif ((int)$fetchUser['id'] === (int)$message['user_send_id']): ?>
                <div class="d-flex justify-content-between mg-t-20">
                  <div class="media wd-90p">
                    <img src="<?= $fetchUser['image_profile']?>" class="wd-36 rounded-circle mg-r-15 mg-t-5" alt="">
                    <div class="media-body bg-gray-lighter pd-20">
                      <div class="d-sm-flex justify-content-between align-items-center mg-b-15">
                        <div class="tx-bold tx-inverse"><?= $fetchUser['login']?></div>
                        <div class="tx-size-12"><?= date('H:i', strtotime($message['created_at']))?></div>
                      </div>
                      <p class="mg-b-0"><?= $message['message']?></p>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <a href="" class="tx-inverse op-1"><i class="icon ion-android-more-horizontal tx-size-18 lh-1"></i></a>
                </div><!-- d-flex -->
        <? endif;?>
      <? endforeach;?>
  </div><!-- mainpanel -->
  <form action="#" method="post">
      <div class="typebox pos-fixed b-0 l-0 l-xl-260 r-0 r-lg-250 bd-t">
        <div class="input-group">
          <span class="input-group-addon bd-0 pd-20 rounded-0"><i class="icon ion-android-attach tx-size-18"></i></span>
             <input type="text" class="form-control bd-0 pd-20" name="message" placeholder="Write something here...">
             <button type="submit" class="btn btn-success" name="message_submit">Отправить</button>
          <span class="input-group-addon bd-0 pd-20 rounded-0"><i class="icon ion-android-happy tx-size-18"></i></span>
        </div><!-- input-group -->
      </div><!-- typebox -->
  </form>

  <div class="rightpanel pos-fixed-right wd-250 bg-white r-neg-250 r-lg-0">
    <div class="media align-items-center ht-100 pd-x-25 bg-gray-dark-light">
      <img class="wd-40 rounded-circle mg-r-15" src="<?= $user['image_profile']?>" alt="">
      <div class="media-body lh-2">
        <a href="" class="tx-white tx-size-14 tx-bold"><?= $user['login']?></a>
        <span class="tx-size-12 tx-gray-light"></span>
      </div><!-- media-body -->
    </div><!-- media -->

    <div class="input-group bd-b bd-color-gray-lightest">
      <input type="search" class="form-control tx-size-14 bd-0 pd-y-15 rounded-0" placeholder="Search contact">
      <span class="input-group-btn">
        <button class="btn bg-white pd-x-15 bd-0 rounded-0"><i class="fa fa-search tx-gray-light"></i></button>
      </span>
    </div><!-- input-group -->

    <div id="contactWrapper" class="pd-y-25 overflow-y-auto pos-absolute t-148 x-0 b-0">
      <h6 class="tx-size-10 tx-uppercase tx-spacing-2 tx-bold pd-x-25 mg-b-20">Ваши друзья</h6>

            <? foreach($fetchFriends as $friend): ?>
                <? if ((int)$friend['request_status'] === 2 && (int)$user['id'] !== (int)$friend['id']): ?>
                      <div class="contact-list">
                        <a href="/message/<?= $friend['id']?>" class="d-block hover-bg-gray-lightest pd-x-25 pd-y-8">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="media align-items-center">
                              <img src="<?= $friend['image_profile']?>" class="rounded-circle wd-36 mg-r-10" alt="">
                              <div class="media-body tx-gray"><?= $friend['login']?></div>
                            </div><!-- media -->
                            <span class="square-8 bg-success rounded-circle"></span>
                          </div>
                        </a>
                      </div>
                <? endif;?>
            <? endforeach; ?>


  </div><!-- rightpanel -->

  <script src="../lib/jquery/jquery.js"></script>
  <script src="../lib/popper.js/popper.js"></script>
  <script src="../lib/bootstrap/bootstrap.js"></script>
  <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script>
  $(function(){
    'use script';

    $('#contactWrapper, #mainPanel').perfectScrollbar();

    $('#showLeftMenu').on('click', function(e){
      if($('body').hasClass('show-left-menu')) {
        $('body').removeClass('show-left-menu');
      } else {
        $('body').addClass('show-left-menu');
      }
      e.preventDefault();
    });

    $('#showRightMenu').on('click', function(e){
      if($('body').hasClass('show-right-menu')) {
        $('body').removeClass('show-right-menu');
      } else {
        $('body').addClass('show-right-menu');
      }
      e.preventDefault();
    });
  });
  </script>

</body>
</html>

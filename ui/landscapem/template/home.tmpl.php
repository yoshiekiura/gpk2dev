<?php
// ----------------------------------------------------------------------------
// Features:	前端 -- home 專用 - 給 guest 權限使用
// File Name:	home.tmpl.php
// Author:		Barkley
// Related:		home.php
// Log:
// 2016.10.18
// ----------------------------------------------------------------------------

//廣告們
//require_once dirname(__FILE__) ."/adsense.php";
//UI樣式(BANNER...)
require_once dirname(__FILE__) ."/ui.php";

// 有變數才執行，沒有變數就是不正常進入此 tmpl 檔案
if(isset($tmpl)) {
	// 正常
}else{
	die('ERROR');
}

$cdn_url_logo				= $cdnfullurl.'img/common/logo.png';
$cdn_url_banner			= $cdnfullurl.'img/common/banner.png';
$template_name ='home';
//header&footer
require_once dirname(__FILE__) ."/header.tmpl.php";
require_once dirname(dirname(__DIR__)) ."/component/carousel.php";
$data["index_carousel"]["mobile"]["item"] = json_decode('[{"img":"img/home/images_ad.jpg","link":"gamelobby.php"},{"img":"img/home/images_ad.jpg","link":"gamelobby.php"},{"img":"img/home/images_ad.jpg","link":"gamelobby.php"}]',true);
/*
// 選單共有 6 個放在 lib.php
// 會員沒有登入的時候，顯示這個選單
menu_guest_management()
// 會員登入前 and 登入後的選單內容
menu_admin_management()
// 語言選擇列的選單
menu_language_choice()
// 會員登入的界面, 登入後顯示餘額及登出資訊
menu_login_ui()
// 系統上方中間功能選單
menu_features()
// 頁腳顯示
page_footer()

// 目前樣本檔 $tmpl 陣列, 共計有下面 8 個變數。
$tmpl['html_meta_description']
$tmpl['html_meta_author']
$tmpl['html_meta_title']
$tmpl['extend_head']
$tmpl['extend_js']
$tmpl['message']
$tmpl['paneltitle_content']
$tmpl['panelbody_content']

// skip
<script src="<?php echo $cdnfullurl_js; ?>jquery/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

*/

?>


  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?php echo $config['companyFavicon'] ?>">
    <meta name="description" content="<?php echo $tmpl['html_meta_description']; ?>">
    <meta name="author" content="<?php echo $tmpl['html_meta_author']; ?>">
    <title>
      <?php echo $tmpl['html_meta_title']; ?>
    </title>
    

	  <!-- head.js -->
	  <?php echo assets_include(); ?>
    <!-- custom -->
<link type="text/css" rel="stylesheet" href="<?php echo $cdnfullurl ?>css/style.css?ver_key_m=<?php echo $config['cdn_version_key'] ?>">

    <?php echo $tmpl['extend_head']; ?>

  </head>
  <body id="index">
     <div id="wrapper">
      <!-- header -->
			<?php
				echo $landscape_mobile_header;
			?>
			<!-- end header -->


        <!-- Marquee-->
        <div class="marqueebox_content_box">
          <div class="marqueebox_content">
          <?php
              // 跑馬燈
              echo $ui['Scroll_marquee'];
            ?> 
          </div>
          <?php 
            echo $marqueebox_content;
            echo $marqueebox_modal;          
          ?>
        </div>
        

          <!-- end Marquee-->
          <!-- Main-->
          <div id="main">
<!-- 首頁gamelobby顯示區域 -->
<script type="text/javascript">
 var global = {
 page: 1,
 stype: 'm',
 casinoid: '',
 mainct: 'hot',
 maxiconnum: 80,
 rnd: '0'
}
</script>
	<?php require_once dirname(dirname(dirname(__DIR__))).'/casino/casino_config.php';

	$gamelist_template['main'] = '
	<div id="mainct">
		<!--<div class="swiper-container">
			<ul id="gNavi" class="nav nav-tabs index_tabmenu swiper-wrapper" role="tablist">
				<li role="presentation" class="swiper-slide active navi_hot"><a href="#index_m_hotgame" aria-controls="index_m_hotgame" role="tab" data-toggle="tab" data-mct="hot" onclick="get_gametable(6,1,\'m\',this);" class="active show" aria-selected="true">热门</a></li>
				{mct_item}
			</ul>
		</div>

		<script>
			var swiper = new Swiper(\'.swiper-container\', {
				slidesPerView: 4.55,
				spaceBetween: 5,
			});
		</script>
  </div>-->

    <!-- 內容顯示區 -->
		<div id="gamelobby_content" class="tab-content container-fluid">
        <div class="offset-space"></div>
		<!-- 热门游戏 -->      
        <div id="banner">   
        '.index_carousel_m_touch().'
        </div>  

        <div class="offset-space"></div>

        <div id="index-gamebox-content">
          <div id="index-gamebox-inner">    
          </div>
        </div>

        <div class="offset-space"></div>

			</div>';
    /*
    $gamelist_template['mct_item'] = '<li role="presentation" class="swiper-slide navi_{mctid}">
      <a href="gamelobby.php?mgc={mctid}&t=hotgames" class="" >{mct_name}</a></li>';
    $gamelist_template['mctag_item'] = '<div id="index_mhot_{mctid}" class="row index_m_title"><div class="col-12"><h5>{mct_name}</h5></div></div><div id="gametable_{mctid}"><div class="gamebox-list"></div></div>';
    $gamelist_template['mcmtag_item'] = '<!-- {mct_name} --><div role="tabpanel" class="tab-pane" id="index_m_{mctid}"><div class="row index_m_title"><div class="col-12"></div></div></div>';*/
		$gamelist_template['mct_item'] = '<li role="presentation" class="swiper-slide navi_{mctid}">
			<a href="gamelobby.php?mgc={mctid}&t=hotgames" class="" >{mct_name}</a></li>';
		$gamelist_template['mctag_item'] = '';
		$gamelist_template['mcmtag_item'] = '';
    
	home_gamelist($gamelist_template,'landscape');
	?>
  
<!-- 首頁gamelobby顯示區域結束 -->

 <!-- 首頁結束 -->
          </div>
          <!-- end Main -->
          <!-- Footer -->          
                  <?php
						// 頁腳顯示
						echo $landscape_mobile_footer;
				    ?>
              <div class="row f_config" style="display="none">
                <?php
	            // Javascript
	            echo $tmpl['extend_js'];              
					?>
            </div>
          
    </div>
  </body>

  </html>

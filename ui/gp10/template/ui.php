<?php
//接收templ  id------------------------------------------------------
$template = $template_name;


//常用變數-----------------------------------------------------------
//logo
if($template == 'admin' OR $template =='member')//這兩頁logo是人頭
  $cdn_url_logo       = $cdnfullurl.'img/common/logo_company.png';
else
  $cdn_url_logo       = $config['companylogo'];

//標題文字
if($template == 'admin')
  $membercenter ="<span>".$tr['Member Centre']."</span>";
elseif($template == 'member')
  $membercenter ="<span>".$tr['Free account']."</span>";
else
  $membercenter="";

// -------------------------------------------------------------------
//引入component元件
// -------------------------------------------------------------------
//廣告元件
$tmpl['extend_head'] .= '<link type="text/css" rel="stylesheet" href="'.$cdnfullurl_js.'component/component.css">';
$tmpl['extend_head'] .= '<script src="'.$cdnfullurl_js.'component/component.js"></script>';
$tmpl['extend_js'] .= '<script>get_component("'.$ui_link.'");</script>';

//跑馬燈
require dirname(dirname(__DIR__)).'/component/marquee.php';
  if($template == 'home')  
    $marquee='';  
  else
    $marquee = '<div class="w-100 header_marquee">
      '.Scroll_marquee().'
      </div>';

//語系選擇-國旗ver
require dirname(dirname(__DIR__)).'/component/menu_language_flag_ver.php';
//客製化menu+footer
require dirname(dirname(__DIR__)).'/component/custom_menu.php';
//客製化theme
require dirname(dirname(__DIR__)).'/component/custom_theme.php';
template_themes('desktop');
//---------------------------------------------------------------------
// header集中管理
//---------------------------------------------------------------------
$header_templ='
<div id="header">
  <div class="hLinkBox clearfix">
   <div class="container">
          <ul class="menu_top">
                    '// 左側選單(語言切換列)
                    .menu_language_flag_ver().
                    // 美東時間
                    menu_time().menu_short_url().'                     
          </ul>
          <ul class="menu_admin">
                    '// 會員選單
                      .menu_admin_management($template_name).'
          </ul>
    </div> 
  </div>

  <div class="hSection">
    <div class="hBox clearfix">
      <div class="headlogin">
        <ul class="clearfix">
              '// 會員登入的界面, 登入後顯示餘額及登出資訊
              .templ_header_login($template).'
        </ul>
      </div>
    </div>
  </div>

  <div class="hInner container clearfix">
    <h1 class="logo"><a href="'.$config['website_baseurl'].'"> 
              
              <img src="'.$cdn_url_logo.'" style="max-width: 200px;max-height: 70px;" alt="LOGO"/> '.$membercenter.'
              </a></h1>
    <ul id="gNavi" class="nav clearfix">
            '// 中間主功能選單
            .templ_header_mainmenu($template).$ui['custom_menu'].'
    </ul>
  </div>    
</div>
'.$marquee;

//---------------------------------------------------------------------
// footer集中管理
//---------------------------------------------------------------------
$footer_templ='
		<footer id="footer" class="footer">
      <div class="d-flex justify-content-center w-100 f_paylogo">'.$ui['footer_payment_logo'].'</div>
      <div class="d-flex justify-content-center w-100 f_parlogo">'.$ui['footer_casino_logo'].'</div>      
        <div class="container">
          <div class="row f_nav">
            <div class="w-100">              
              <div class="d-flex justify-content-center w-100 f_morelink">'.$ui['footer_link'].'</div>
            '// 頁腳顯示
            .page_footer().'
            </div>
          </div>
        </div>
      </footer>
';

?>
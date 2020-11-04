<?php
// ----------------------------------------------------------------------------
// Features:	前端 -- 會員已登入頁面, 給會員中心的樣板
// File Name:	admin.tmpl.php
// Author:		Barkley
// Related:
// Log:
// 2016.10.18
// ----------------------------------------------------------------------------

require_once dirname(__FILE__) ."/ui.php";
// 有變數才執行，沒有變數就是不正常進入此 tmpl 檔案
if(isset($tmpl)) {
	// 正常
}else{
	die('ERROR');
}

$cdn_url_logo				= $cdnfullurl.'img/common/logo_company.png';
$cdn_url_banner			= $cdnfullurl.'img/common/banner.png';
$template_name = 'admin';
//header&footer
require_once dirname(__FILE__) ."/header.tmpl.php";

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
*/
if(isset($tmpl['sidebar_content'])){
	$sidebar_template=<<<HTML
	<div class="col-2 sidebar">
		<div class="sider-back">
			<img onclick="history.go(-1);" src="{$cdnfullurl}img/home/btn_back.png" alt="">
		</div>
	 _siderbar-menu_ 
	 </div>
HTML;
	$tmpl['sidebar_content'] = combine_sidebarmenu($tmpl['sidebar_content'],$sidebar_template);
}
?>


<!DOCTYPE html>
<html>

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="<?php echo $config['companyFavicon'] ?>">
		<meta name="description" content="<?php echo $tmpl['html_meta_description']; ?>">
		<meta name="author" content="<?php echo $tmpl['html_meta_author']; ?>">
		
		<title>
			<?php echo $tmpl['html_meta_title']; ?>
		</title>

	  <!-- head.js -->
	  <?php echo assets_include(); ?>
	  <!-- jquery.datetimepicker.js -->
		<link rel="stylesheet" type="text/css" href="<?php echo $cdnfullurl_js; ?>datetimepicker/jquery.datetimepicker.css"/>
		<script src="<?php echo $cdnfullurl_js; ?>datetimepicker/jquery.datetimepicker.full.min.js"></script>	    
    <!-- custom -->
<link type="text/css" rel="stylesheet" href="<?php echo $cdnfullurl ?>css/style.css?ver_key_m=<?php echo $config['cdn_version_key'] ?>">		

		<?php echo $tmpl['extend_head']; ?>
	</head>
	<body id="admin">
		<div id="wrapper">
			<!-- header -->
			<?php
				//echo $mobile_header;
			?>
			<!-- end header -->
				<!-- Marquee-->
			<?php
						// 跑馬燈
            //echo $ui['Scroll_marquee'];
          ?>
				<!-- end Marquee-->

			<!-- Main-->
			<div class="md-header mb-4">				
		    	<span class="md-title"><?php echo $function_title; ?></span>
		    </div>
		    <div class="row m-0">
					<?php
					// 側邊欄內容
					if(isset($tmpl['sidebar_content']))
						echo $tmpl['sidebar_content'];
					?>
				<div id="md-main" class="col">
					<!-- content-->
					<div class="container">
					<!--手機不顯示Breadcrumb
						<div class="row">
							<div class="col-12">
								<?php
									// Breadcrumb
									//echo $tmpl['paneltitle_content'];
									?>
							</div>
						</div> -->					
								<div class="card">
								<!--<h3 class="card-header">
									<?php
								// 工作區標題
								//echo $tmpl['paneltitle_content'];
								?>
								</h3>-->
									<div class="card-body">
										<?php
								// 工作區內容
								echo $tmpl['panelbody_content'];
								?>
									</div>
								</div>
					</div>
				</div>
			</div>
			<!-- end main container -->
			<!-- Footer -->

			<footer>
							<?php
						// 頁腳顯示
						//echo $mobile_footer;
				    ?>
					<div class="row f_config">
						<?php
	            // Javascript
	            echo $tmpl['extend_js'];
					?>
					</div>
			</footer>
		</div>
		<!-- end wrapper -->
	</body>

	</html>

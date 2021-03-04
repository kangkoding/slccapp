<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ settings('website_name') }} | @yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="copyright" content="{{ settings('website_name') }}">
    <meta name="rating" content="general">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ settings('website_name') }}">
    <meta name="keywords" content="{{ settings('website_name') }}">
    <meta name="author" content="{{ settings('website_name') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ base_url() }}assets/img/favicon.ico">
    <!-- Web Fonts
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin"> -->
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ base_url() }}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/style.css">
    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="{{ base_url() }}assets/css/header-v4.css">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/footer-v1.css">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ base_url() }}assets/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- CSS Theme -->
    <link rel="stylesheet" href="{{ base_url() }}assets/datatables/datatables.min.css">
    <script type="text/javascript" src="{{ base_url() }}assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ base_url() }}assets/css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
    <!-- CSS Customization -->
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
        }
        body img {
            max-width:100%;
        }
        h1,h2,h3,h4,h5,p,span {
            font-family: 'Noto Sans', sans-serif!important;
        }
        .purchase {
            background: none;
            border-bottom: none;
            padding: 20px;
        }
        .section {
            border-top:1px solid #eceaea;
            border-bottom:1px solid #eceaea;
        }
        .recognition {
            min-height: 200px;
            background: linear-gradient(to left, #f3f2f2 , #f3f1f1);
        }
        .text-center {
            text-align: center;
        }
        .mB-10 {
            margin-bottom: 10px;
        }
        .p-20 {
            padding: 20px;
        }
        .pT-0 {
            padding-top: 0px;
        }
        .btn {
            border-radius: 5px!important;
        }
        .btn-primary {
            background: linear-gradient(to bottom , #03A9F4 , #34c0ff);
            border:0px!important;
        }
        .c-blue {
            color:#065077;
        }
        .border-right {
            border-right: solid 1px #dcdcdc;
        }
        .border-bottom {
            border-bottom: solid 1px #dcdcdc;
        }
        .future-block {
            border-right: dotted 1px #dcdcdc;
            height: 110px;
            cursor: pointer;
        }
        .future-block:hover {
            color: #065077!important;
        }
        .future-block:hover .icon-block {
            border-color:#0283bd;
        }
        .icon-block {
            border:solid 1px #cce7ee;
            border-radius:30px!important;
        }
        .news {
            background: radial-gradient(#eaeaea, #f3f1f100);
        }       
        .news-images {
            width: 100%;
            height: 200px;
            background-size:cover!important;
        }
        .img-brosur {
            width: 100%;
            border: solid 1px #dcdcdc;
            background-color: blue;
            box-shadow: 0px 2px 4px 0px #b3b3b3;
        }
        .header-v4 .navbar-header {
            margin: 0px 0px;
        }
        .header-v4 .navbar-default .navbar-nav > li > a {
            font-size: 12px;
            padding: 10px 10px 11px 10px;
        }
        .panel-body {
            padding: 10px;
        }
        label {
            margin-bottom: 5px;
        }
        .form-group {
            margin-bottom: 5px;
        }
        .panel-heading {
            padding: 5px 15px;
            color:white;
        }

        * {
            border-radius:0px!important;
        }
        .header-v4 .navbar-default .navbar-nav > li > a {
            text-transform: uppercase!important;
            font-weight: bolder!important;
            font-size: 16px;
        }
        .header-v4 .navbar-default .navbar-nav > li:hover > a {
            color: #065077;
            border-top: solid 2px #065077;
            transition: all 1s;
        }
        .header-v4 .dropdown > a:after {
            top: 10px;
            right: 0px;
            content: "\f0d7";
            color: #03A9F4;
        }
        .banner-left {
            left: 15px!important;
            z-index: 999;
            width: 50px;
            height: 450px;
            position: fixed;
            background: url({{ base_url('assets/images/').settings('lbanner_images') }}) no-repeat;
        }
        .banner-left > span {
            position: absolute;
            bottom: -30px;
            line-height: 1;
            color: #656262;
        }
        .boxed-layout {
            box-shadow: none!important;
        }
        .footer-v1 .footer {
            background: #2196F3!important;
        }
        .footer-v2 .copyright {
            background-color: #142633!important;
        }
        .c-white {
            color:white!important;
        }
        .panel-sidebar .panel-heading {
            padding-left: 0px;
            padding-bottom: 0px;
            border-bottom: solid 1px #2196f3;
        }
        .panel-sidebar .panel-heading > h3 {
            background-color: #2196f3;
            width: 125px;
            padding-left: 10px;
        }
        .logo {
            margin:20px;
            width: 45px!important;
            margin-top:20px;
            margin-bottom: 0px;
        }
        .greeting{
            font-size: 20px;
        }
        .top-menu {
            top: 0px;
        }
        .header-v4 .top-menu .navbar-nav > li {
            border-left:solid 1px silver!important;
        }
        .header-v4 .top-menu .navbar-nav > li > a {
            font-size: 14px!important;
        }
        .menu-top {
            padding: 0px!important;
            padding-right: 10px!important;
            border-right: solid 1px silver!important;
        }
        .wrapper-mobile {
            background-color: white!important;
            z-index:9999!important;
        }
        .carousel-indicators {
            bottom: -40px;
        }
        .carousel-indicators li {
            border-color: #03A9F4!important;
            border-radius: 100%!important;
        }
        .carousel-indicators .active {
            background-color: #03A9F4;
        }
        .carousel-control {
            display: none;
        }
		.close-tip {
			height: 50px;
		    width: 50px;
		    position: absolute;
		    top: 0px;
		    right: 0px;
		    z-index: 9999;
		    border-radius: 100%!important;
		    background-color: white;
		    color: black;
		}
        .content-images {
            border:solid 2px white;
            box-shadow: 0px 0px 2px 0 black;
        }
        .content-images:hover {
            box-shadow: 0px 0px 5px 0 black;
        }
        .site-identity {
            float:left;
            margin-left:-10px;
        }
        .site-title {
            padding: 0px;
            margin-top: 20px;
            font-weight: bolder;
            font-size: 17px;
            text-transform: uppercase;
            font-family: sans-serif;
            margin-bottom: -5px;
        }
        @media screen and (max-width:992px){
            .t-none {
                display: none;
            }
        }
        @media screen and (max-width:460px){
            .wrapper-mobile {
                z-index:0!important;
            }
            body {
                overflow-x:hidden;
            }
            .future-block {
                border-right:0px!important;
                height:150px;
            }
            .navbar-nav {
                margin: 0px;
                border-left: 0px;
                border-right: 0px;
                padding: 10px;
            }
            .navbar-collapse {
                margin-top: 40px;
            }
            .greeting {
                font-size: 13px!important;
                margin-bottom: 50px;
            }
            .m-none {
                display: none;
            }
            .other-app {
                text-align: right;
                border-bottom: solid 1px silver;
                padding-bottom: 10px;
                padding-top: 10px;
            }
            .header-v4 .navbar-default .navbar-toggle {
                width: 100%;
                overflow: hidden;
                margin-bottom: 0px;
                border-color: rgba(0,0,0,0);
            }
            .carousel-inner {
                margin-top: 20px;
            }
            .carousel-inner>.item>a>img {
                display: block;
                max-width: 1000px;
                height: 180px;
                overflow: hidden;
            }
            .carousel-control {
                display: none!important;
            }
            .header-v4 .navbar-default {
                margin-top: -55px;
            }
            .navbar-toggle {
                border: 1px solid transparent;
            }
            .header-v4 .navbar-toggle, .header-v4 .navbar-default .navbar-toggle:hover, .header-v4 .navbar-default .navbar-toggle:focus {
                background:rgba(0,0,0,0);
            }
            .header-v4 .navbar-nav {
                border:none!important;
            }
            .navbar-collapse {
                height: 100vh!important;
            }
            .navbar-collapse html {
                height: 100vh;
                overflow: hidden;
            }
            .header-v4 .navbar-default .navbar-nav > li:hover > a { 
                transition:none!important;
            }
            .banner-left {
                width: 30px!important;
                height: 110px;
                position: absolute!important;
                background-repeat: no-repeat!important;
                background-position-y: -320px!important;
            }
            .banner-left > span {
                color: #FFEB3B;
                display: none;
            }
            .logo {
                width: 37px!important;
                margin-top: 13px;
                margin-left: 50px;
                margin-bottom: 5px;
            }
            .banner-left > span {
                position: absolute;
                bottom: -60px;
            }
            .banner-span {
                display: block;
                padding-left: 70px;
                padding-bottom: 20px;
            }
            .mM-0 {
                margin: 0px;
            }
            .section {
            }
            #nav.affix .banner-span {
                padding-left: 10px;
            }
            #nav.affix .logo {
                margin-left: 10px;
                width: 30px;
            }
            .site-identity {
                margin-top:-10px;
            }
            .site-title {
                font-size: 15px!important;
            }
        }
        @media screen and (min-width: 460px){
            .navbar-toggle {
                border:rgba(0,0,0,0);
                position: absolute;
                top: -10px;
            }
            .navbar-nav {
                margin-top:20px!important;
            }
            .header-v4 .navbar-toggle, .header-v4 .navbar-default .navbar-toggle:hover, .header-v4 .navbar-default .navbar-toggle:focus {
                background:rgba(0,0,0,0);
            }
            .other-app {
                position: absolute;
                right: 60px;
                top: 25px;
            }
            .about-sec {
                border-bottom:1px solid silver;
                width:100%;
                margin-top:10px;
                padding-bottom: 20px;
            }
            .banner-span {
                display:none;
            }
            .wrapper-mobile {
                margin-bottom: 20px;
            }
        }
        @media screen and (min-width: 460px) and (max-width:992px){
            .banner-left {
                width: 50px!important;
                height: 100px!important;
                position: absolute!important;
                background-repeat: no-repeat!important;
                background-position-y: -340px!important;
            }
            .logo {
                width: 100px;
                margin-top: 18px;
                margin-bottom: 5px;
                margin-left: 90px;
            }
            #nav.affix .logo {
                margin-left:20px;
            }
            .carousel-inner {
                margin-top:30px;
            }
            .about-sec > span {
                padding-left: 60px;
            }
            .navbar-nav {
                margin-top: 0px!important;
                padding: 20px;
            }
            .wrapper-mobile {
                z-index:0!important;
            }
            .header-v4 .navbar-default {
                margin-top:-55px;
            }
            .carousel {
                padding-top:40px;
            }
            .header-v4 .navbar-nav {
                margin-top: 90px!important;
            }
            #nav.affix .header-v4 .navbar-nav {
                margin-top: 40px!important;
            }
        }
        @media screen and (min-width: 992px){
            #nav.affix {
                position: fixed;
                top: 0;
                z-index: 9999;
                -webkit-transition: all .3s;
                -o-transition: all .3s;
                transition: all .3s;
            }
            #nav.affix img.logo {
                width: 70px;
            }
            #nav.affix .navbar-nav {
                margin-top: 10px!important;
            }
            .about-sec {
                padding-bottom: 10px;
            }
            .banner-span {
                display: none;
            }
            .dm {
                position:absolute!important;right:0px!important;
            }
            .dm > ul.dropdown-menu {
                position:absolute!important;right:0px!important;
            }
            .header-v4 .navbar-collapse {
                border : 0px!important;
            }
            .header-v4 .navbar-default .navbar-nav > li {
                border: 0px!important;
                margin-left:10px;
            }
            .mega-menu {
                position: absolute;
                bottom: -85px;
                right: 20px;
            }
            .head {
                height:120px;
            }
            .lang {
                right:0px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{base_url('assets/css/custom-ui.css')}}">
    </head>
<body class="">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="wrapper">
    <div class="header-v4">
        <div class="row header-wrapper mM-0"  data-spy="affix" data-offset-top="197" id="nav" style="width:100%;background-color:white;padding-bottom: 5px;">
                <a href="{{ base_url() }}" target="blank">
                <div class="col-md-3 wrapper-mobile">
                    <div class="row">
                        <div class="" style="overflow:hidden;float:left">
                            <img src="{{ base_url('assets/images/').settings('logo') }}" alt="" class="logo" style="width:70px;height:auto">
                        </div>
                        <div class="site-identity">
                            <h4 class="site-title">{{ settings('website_name') }}</h4>
                            <span>{{ settings('site_tagline') }}</span>
                        </div>
                    </div>
                </div>
                </a>
                <div class="col-md-9" style="height:100%">
                    <div class="navbar navbar-default mega-menu top-menu t-none"  role="navigation">
                        <div class="container" style="padding: 0px;">
                            <div class="navbar-header">  
                                <button type="button" class="navbar-toggle " data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                    <span class="full-width-menu" style="visibility:hidden">Menu</span>
                                    <span class="icon-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </span>    
                                </button>
                            </div>
                        </div>    
                        <div class="clearfix"></div>
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <div style="">
                                <ul class="nav navbar-nav dm navbar-top">
                                    @foreach(top_menu() as $tm)
                                    <li><a href="{{ $tm['url'] }}" class="menu-top">{{ $tm['title'] }}</a></li>
                                    @endforeach
                                    @php $lang = $this->session->userdata('swu_lang') @endphp
                                    <li><a href="{{ base_url('login') }}" class="menu-top" > Login</a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle menu-top" data-toggle="dropdown">
                                            <?php if($lang == 1 || $lang == ''){ ?>
                                                ID 
                                                <?php }else if($lang == 2){ ?>
                                                ENG 
                                                <?php } ?>
                                        </a>
                                        <ul class="dropdown-menu lang nnav-black">
                                            <li><a href="{{ base_url('/home/lang/1') }}">ID</a></li>
                                            <li><a href="{{ base_url('/home/lang/2') }}">ENG</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="navbar navbar-default mega-menu" role="navigation">
                        <div class="container" style="padding: 0px;">
                            <div class="navbar-header">  
                                <button type="button" class="navbar-toggle " data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                    <span class="full-width-menu" style="visibility:hidden">Menu</span>
                                    <span class="icon-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </span>    
                                </button>
                            </div>
                        </div>    
                        <div class="clearfix"></div>
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <div class="container" style="">
                                <ul class="nav navbar-bottom navbar-nav dm">
                                    @foreach(load_menu() as $menu)
                                        @if(empty($menu['sub_menu']))
                                        <li class="">
                                            <a href="<?php if($menu['is_url'] != 1) { echo base_url().$menu['slug']; } else { echo $menu['slug']; } ?>"> {{ $menu['menu'] }}</a>
                                        </li>
                                        @else
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" {{ $menu['parameter'] }}>
                                               {{ $menu['menu'] }} 
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach($menu['sub_menu'] as $sub_menu)
                                                <li><a href="<?php if($sub_menu->is_url != 1) { echo base_url().$sub_menu->slug; } else { echo $sub_menu->slug; } ?>" {{ $sub_menu->parameter }}> {{ $sub_menu->submenu }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div> 
    <div>
    <div class="">
    @yield('carousel')
    </div>
    @yield('content')
    </div>
    </div>
    <div id="footer-v1" class="footer-v1">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-md-3 md-margin-bottom-40">
                    <div class="headline"><h2>{{ settings('foot1') }}</h2></div>
                        <ul class="list-unstyled link-list">
                        @foreach(load_menu() as $menu)
                          <li><a href="{{ base_url().$menu['slug'] }}">{{ $menu['menu'] }}</a><i class="fa fa-angle-right"></i></li>
                        @endforeach
                        </ul>
                    </div>
                    <!-- End About -->
                    <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>{{ settings('foot2') }}</h2></div>
                        <ul class="list-unstyled link-list">
                            @foreach(external_link() as $link)
                                <li><a href="{{ $link->url }}">{{ $link->title }}</a><i class="fa fa-angle-right"></i></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Link List -->   
                    <!-- Latest -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>{{ settings('foot3') }}</h2></div>
                            <address class="md-margin-bottom-40">
                            <a href="{{ settings('facebook_url') }}" style="color:#ecf0f1;"><i class="fa fa-facebook fa-fw"></i> Facebook<br/></a>
                            <a href="{{ settings('twitter_url') }}" style="color:#ecf0f1;"> <i class="fa fa-twitter fa-fw"></i> Twitter<br/></a>
                            <a href="{{ settings('instagram_url') }}" style="color:#ecf0f1;"> <i class="fa fa-instagram fa-fw"></i> Instagram <br /></a>
                        </address>
                    </div>  
                    <!-- End Latest -->                
                    <!-- Address -->
                    <div class="col-md-3 map-img md-margin-bottom-40">
                        <div class="headline"><h2>{{ settings('foot4') }}</h2></div>                         
                        <address class="md-margin-bottom-40">
                            <i class="fa fa-map-marker fa-fw"></i> {{ settings('alamat') }} <br/>
                            <i class="fa fa-phone fa-fw"></i> {{ settings('telp') }}<br />
                            <i class="fa fa-envelope fa-fw"></i> <a href="mailto:cc@swu.ac.id" style="color:#ecf0f1;">{{ settings('email') }}</a> 
                        </address>
                    </div>
                    <!-- End Address -->
                </div>
            </div> 
        </div><!--/footer-->
    <div class="footer-v2">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                     
                        <center><p>
                            &copy; <a href=""  class="c-white">{{ settings('website_name') }}  </a>
                           <a href="#" class="c-white">Privacy Policy</a> |
                           <a href="#" class="c-white">Terms of Service</a>
                        </p></center>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div> 
        </div>
    </div>     
    </div><!--/wrapper-->
	<div id="modalPreview" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
	    <!-- Modal content-->
	    <div class="modal-content">
	    	<button type="button" class="close close-tip" data-dismiss="modal">&times;</button>
		      <div class="modal-body">
		      	<img src="" alt="" id="prv" width="100%">
		      </div>
	    </div>

	  </div>
	</div>
	<script>
	$(document).ready(function(){
		$('.content-images').click(function(){
			var url = $(this).attr('src');
			$('#prv').attr('src',url);
			$('#modalPreview').modal('show');
		});
	});
	</script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
</body>
</html>
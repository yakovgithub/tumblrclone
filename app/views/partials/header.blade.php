<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" > <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" > <!--<![endif]-->
<head >
  <meta charset="utf-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <title >@yield('title')</title >
  <meta name="description" content="xstumbl" >
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/minified/application.min.css')}}" >
  <script src="{{asset('assets/minified/modernizr.min.js')}}" ></script >
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#21d0f7">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
  <?php echo html_entity_decode(Setting::where('option', '=', 'header_code')->first()->value); ?>
</head >
<body >
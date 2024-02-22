<!DOCTYPE html>
<html data-wf-page="{{ isset($dataWfPage) ? $dataWfPage : '649fd0a508379c19102cde80' }}" data-wf-site="{{ isset($dataWfSite) ? $dataWfSite : '6458c8fa2608d11548b9191e' }}">
<head>
	<meta charset="utf-8">
	<title>0xGamble - The First Autonomous BSC Gambling Token</title>
	<meta content="Each buy, sell or transfer has a chance of winning or burning the pot. It&#x27;s that easy!" name="description">
	<meta content="0xGamble - The First Autonomous BSC Gambling Token" property="og:title">
	<meta content="Each buy, sell or transfer has a chance of winning or burning the pot. It&#x27;s that easy!" property="og:description">
	<meta content="https://uploads-ssl.webflow.com/6458c8fa2608d11548b9191e/64a193542d4f8e4d8e49c06d_og-image.png" property="og:image">
	<meta content="0xGamble - The First Autonomous BSC Gambling Token" property="twitter:title">
	<meta content="Each buy, sell or transfer has a chance of winning or burning the pot. It&#x27;s that easy!" property="twitter:description">
	<meta content="https://uploads-ssl.webflow.com/6458c8fa2608d11548b9191e/64a193542d4f8e4d8e49c06d_og-image.png" property="twitter:image">
	<meta property="og:type" content="website">
	<meta content="summary_large_image" name="twitter:card">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	
	<link href="/css/normalize.css" rel="stylesheet" type="text/css">
	<link href="/css/webflow.css" rel="stylesheet" type="text/css">
	<link href="/css/klio.webflow.css" rel="stylesheet" type="text/css">
	<style>@media (max-width:991px) and (min-width:768px) {html.w-mod-js:not(.w-mod-ix) [data-w-id="8c36c99f-8c6e-5762-67b6-70b63b2d871a"] {height:0px;}}@media (max-width:767px) and (min-width:480px) {html.w-mod-js:not(.w-mod-ix) [data-w-id="8c36c99f-8c6e-5762-67b6-70b63b2d871a"] {height:0px;}}@media (max-width:479px) {html.w-mod-js:not(.w-mod-ix) [data-w-id="8c36c99f-8c6e-5762-67b6-70b63b2d871a"] {height:0px;}}</style>
	
	<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
	
	<link href="/images/favicon.png" rel="shortcut icon" type="image/x-icon">
	<link href="/images/webclip.png" rel="apple-touch-icon">
	<script defer="" src="https://cdn.jsdelivr.net/npm/@finsweet/attributes-copyclip@1/copyclip.js"></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/web3@^1.0.0/dist/web3.min.js"></script> --}}
</head>
<body class="body-2">

	@include('components.nav-top')

	@yield('content')

	@include('sections.footer')

	{{-- default scripts: do not edit --}}
	<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6458c8fa2608d11548b9191e" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="/js/webflow.js" type="text/javascript"></script>

	{{-- Import app JS --}}
	@vite('resources/js/app.js')
	
	{{-- Import JS from sections --}}
	@stack('scripts')

</body>
</html>
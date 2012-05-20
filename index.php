<?php
  include $_SERVER['DOCUMENT_ROOT'] . "/includes/functions.php";
  $page = $_GET['page'] == null ? 'home' : $_GET['page'];
  if($_POST) { $sucess = storeAddress($_POST); }
?>
<html>
<head>
  <meta charset="utf-8" />
   
  <title>B&#252;m Haus</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />      
  <meta name="keywords" content="" />

  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, maximum-scale=1.0" />
  <meta name="format-detection" content="telephone=no">

  <link rel="shortcut icon" href="/favicon.ico" /> 
  <link rel="apple-touch-icon" href="/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon114x114.png" />
  
  <link rel="stylesheet" href="/stylesheets/base.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->
  
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="/javascripts/base.js" type="text/javascript"></script>
  <script src="/javascripts/jquery.neosmart.fb.wall.js" type="text/javascript"></script>
  
  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
</head>
<body id="<?php echo $page; ?>">
  <header class='clearfix'>
    <hgroup>
      <h1>b&#252;m haus</h1>
      <h2>paintball</h2>
    </hgroup>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="?page=roster">Roster</a></li>
        <li><a href="/">Gallery</a></li>
        <li><a href="?page=events">Events</a></li>
        <li><a href="/">Contact</a></li>
      </ul>
    </nav>
  </header>
  <div id="content">
    <?php including($page); ?>
  </div>
  <footer class='clearfix'>
    <p>&copy;2012 b&#252;m haus</p>
    <ul>
      <li class='title'>Keep in touch</li>
      <li><a href="#" class="facebook">Facebook</a></li>
      <li><a href="#" class="twitter">Twitter</a></li>
      <li>
        <form id="mailchimp" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type="email" name="email" placeholder="enter email address" />
          <input type="hidden" value="true" name="mailchimp" />
          <input type="submit" value="Submit" />
        </form>
      </li>
    </ul>
  </footer>
</body>
</html>
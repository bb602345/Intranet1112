<html>
  <head>
    <title>內聯網</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/js/jquery.slim.min.js" type="text/javascript"></script>
    <script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/js/tether.min.js" type="text/javascript"></script>
    <script src="/js/popper.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>
    <link href="/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <style>
      .bg-custom { background-color: #2e1c0c; }
      .bg-body{ background-color: #F9E8D4; }
      .no-padding{ padding:0px; }
      .navbar-toggler { padding:9px 10px;}
      .icon-bar { display: block; width: 22px; height: 2px; border-radius: 1px; background-color: #dae0e5!important;}
      .icon-bar+.icon-bar { margin-top:4px; }
      .nav-item.active > .nav-link { color:white !important; }
      .nav-link:not(.dropdown-toggle) { color:#6a6a6a !important; min-width:75px; text-align: center;}
      .nav-link.dropdown-toggle  { color:white !important; }
      .navbar-brand { margin-right: 25px; font-size:24px; }
      .navbar { font-size: 18px; }
      .nav-item.dropdown { width:100%; }
      body { padding-top: 4.5rem; padding-left:4px; padding-right:4px; }
    </style>

  </head>
  <body class="bg-body">
    <nav class="navbar navbar-expand-md navbar-light bg-custom fixed-top">
      <a class="navbar-brand text-light" href="#">內聯網</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if ($active == 'notice') echo 'active'; ?>">
            <a class="nav-link text-light" href="/notice">通告</a>
          </li>
          <li class="nav-item <?php if ($active == 'order') echo 'active'; ?>">
            <a class="nav-link text-light" href="/order">柯打</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">收貨</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">通訊錄</a>
          </li>
        </ul>

        <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
        <?php if(isset($_SESSION['login_user'])) :?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?=$_SESSION['login_user']['chr_name']?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/user/logout">登出</a>
              <a class="dropdown-item" href="#">修改密碼</a>
            </div>
          </li>

        <?php else:?>
          <li class="nav-item active">
            <a class="nav-link text-light" href="/login">登入</a>
          </li>

        <?php endif; ?>
        </ul>
      </div>
    </nav>

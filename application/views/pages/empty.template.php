<style>
.sidebar-nav > .sidebar-brand {color: #999999;}
.sidebar-nav { font-size: 18px; }
.sidebar-nav > li { font-size: 1em; }
.sidebar-nav > li > a.active {
  text-decoration: none;
  color: #fff;
  background: rgba(255, 255, 255, 0.2);
}
body { padding-top:62px; }

@media (max-width: 768px){
  .navbar-toggler-custom {display:block !important;}
  .show-xs-down { display: flex!important; }
  .sidebar-nav { width:100%; font-size: 16px; }
  #wrapper.toggled #sidebar-wrapper { width:100%; }
  body {padding-bottom:50px;}
}


</style>
<div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        </br></br>
        <li class="sidebar-brand"><h4>請選擇部門</h4></li>
        <li><a class="active" href="/phonebook">全部</a></li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">

        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<nav class="navbar navbar-expand-md navbar-light bg-custom fixed-bottom show-xs-down" style="display:none;height:50px;">
  <button class="navbar-toggler navbar-toggler-custom" type="button" onclick="toggle(event)">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</nav>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="form" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">大量申請</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!--<form method="POST" action="">-->
    <div id="modal-body" class="modal-body modal-body-custom-1 row">
      <div class="col-8" id="form-title"></div>
      <div class="col-4"><input type="tel" size="10"> 張</div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="submitBtn" onclick="alert('已提交申請')" data-dismiss="modal">提交</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
    </div>
  </div>
</div>
</div>

<!-- Menu Toggle Script -->
<script>
setToggledClass();
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
$(window).resize(setToggledClass);


function toggle(e){
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
}
function setToggledClass(){
  let w = $( window ).width();
  if(w <= 768) $("#wrapper").removeClass("toggled");
  else $("#wrapper").addClass("toggled");
}
</script>

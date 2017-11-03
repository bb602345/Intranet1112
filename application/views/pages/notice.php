<style>
.sidebar-nav > .sidebar-brand {color: #999999;}
.sidebar-nav { font-size: 18px; }
.sidebar-nav > li { font-size: 1em; }
.sidebar-nav > li > a.active {
  text-decoration: none;
  color: #fff;
  background: rgba(255, 255, 255, 0.2);
}
.table-notice { font-size: 16px; width:100%;}
.table-notice > .header { font-size:1.2em; }
.table-notice > .content {font-size:0.9em; }
.table-notice > .header > div{ border:1px solid #DDD; text-align:center; font-weight: bold;}
.table-notice > .content > div{ border:1px solid #DDD; }

.button-notice { display:none; }
.button-notice > .row { width:105%; }
.button-notice-col {padding-left: 4px; padding-right: 4px; }
.btn-custom-2 { background-color: #7D5001; color: #FFF; font-size: 14px; margin-bottom:4px; text-align:left;}
.btn-custom-2:hover { color: #EAEA00; }
body { padding-top:62px; }

@media (max-width: 768px){
  .navbar-toggler-custom {display:block !important;}
  .show-xs-down { display: flex!important; }
  .sidebar-nav { width:100%; font-size: 16px; }
  .table-notice { font-size: 14px; }
  #wrapper.toggled #sidebar-wrapper { width:100%; }
  body {padding-bottom:50px;}
}
@media (max-width: 576px){
  .table-notice { display:none; }
  .button-notice {display: flex !important;}
}
@media (max-width: 375px){
  .btn-custom-2 {font-size:12px;}
}

</style>
<div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        </br></br>
        <li class="sidebar-brand"><h4>請選擇部門</h4></li>
        <li><a class="<?php if($deptID == '0'): echo "active"; endif; ?>"
               href="/notice">全部</a></li>
        <?php foreach($depts as $dept) : ?>
          <li><a class="<?php if($deptID == $dept['int_id']): echo "active"; endif; ?>"
                 href="/notice/<?=$dept['int_id']?>">
            <?=$dept['chr_name']?>
          </a></li>
        <?php endforeach?>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
          <h1>通告</h1>
          <br/>
          <div class="table-notice">
            <div class="row header">
              <div class="col-3">日期</div>
              <div class="col-2">編號</div>
              <div class="col-5">主題</div>
              <div class="col-2">部門</div>
            </div>
            <?php foreach($notices as $notice) : ?>
            <div class="row content">
              <div class="col-3"><?=$notice['start_date']?> (<?=$notice['date_diff']?>)</div>
              <div class="col-2"><?=str_pad($notice['int_id'], 5, '0', STR_PAD_LEFT)?></div>
              <div class="col-5"><a href="<?=$notice['chr_doc_path']?>" target="_blank"><?=$notice['chr_title']?></a></div>
              <div class="col-2"><?=$notice['dept_name']?></div>
            </div>
          <?php endforeach; ?>
          </div>

          <div class="button-notice">
            <div class="row">
                <?php foreach($notices as $notice) : ?>
                <div class="col-6 button-notice-col">
                  <a href="<?=$notice['chr_doc_path']?>" class="btn btn-custom-2 btn-lg btn-block" target="_blank">
                    <div class="row">
                      <div class="col-6"><?=$notice['start_date']?> (<?=$notice['date_diff']?>)</div>
                      <div class="col-6" style="text-align:right;"><?=$notice['dept_name']?></div>
                    </div>
                    <div style="text-align:center;"><i><b><?=str_pad($notice['int_id'], 5, '0', STR_PAD_LEFT)?></b></i></div>
                    <div style="text-align:center;"><?=$notice['chr_title']?></div>
                  </a>
                </div>
                <?php endforeach; ?>
            </div>
          </div>
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

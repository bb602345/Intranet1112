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
.table-notice > .header > div{ border:1px solid #CCC; text-align:center; font-weight: bold;}
.table-notice > .content > div{ border:1px solid #CCC; padding:4px 4px;}

.button-notice { display:none; }
.button-notice > .row { width:105%; }
.button-notice-col {padding-left: 4px; padding-right: 4px; }
.btn-custom-2 { background-color: #7D5001; color: #FFF; font-size: 14px; text-align:left; border-radius: 0;}
.btn-custom-3 { background-color: #7D0101; color: #FFF; font-size: 14px; text-align:left; border-radius: 0; text-align:center;}
.btn-custom-2:hover { color: #EAEA00; }
.btn-custom-3:hover { color: #EAEA00; }
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
  .btn-custom-3 {font-size:12px;}
}

</style>
<div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        </br></br>
        <li class="sidebar-brand"><h4>請選擇部門</h4></li>
        <li><a class="<?php if($deptID == '0'): echo "active"; endif; ?>"
               href="/form">全部</a></li>
        <?php foreach($depts as $dept) : ?>
          <li><a class="<?php if($deptID == $dept['int_id']): echo "active"; endif; ?>"
                 href="/form/<?=$dept['int_id']?>">
            <?=$dept['chr_name']?>
          </a></li>
        <?php endforeach?>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
          <h1>表格</h1>
          <br/>
          <div class="table-notice">
            <div class="row header">
              <div class="col-2">日期</div>
              <div class="col-2">編號</div>
              <div class="col-3">主旨</div>
              <div class="col-2">部門</div>
              <div class="col-3">大量申請</div>
            </div>
            <?php foreach($forms as $form) : ?>
            <div class="row content">
              <div class="col-2"><?=$form['date']?></div>
              <div class="col-2"><?=str_pad($form['int_id'], 5, '0', STR_PAD_LEFT)?></div>
              <div class="col-3"><a href="<?=$form['chr_doc_path']?>" target="_blank"><?=$form['chr_title']?></a></div>
              <div class="col-2" style="text-align:center;"><?=$form['dept_name']?></div>
              <div class="col-3">
                <span style="width:50%; display:inline-block">
                  <input type="tel" style="width:70%;"/> 張
                </span>
                <span style="width:30%; display:inline-block" onclick="alert('已提交申請')">
                  <button style="width:100%; max-width:50px; min-width:50px;">確定</button>
                </span>
              </div>
            </div>
          <?php endforeach; ?>
          </div>

          <div class="button-notice">
            <div class="row">
                <?php foreach($forms as $form) : ?>
                <div class="col-6 button-notice-col">
                  <a href="<?=$form['chr_doc_path']?>" class="btn btn-custom-2 btn-lg btn-block" target="_blank">
                    <div class="row">
                      <div class="col-6"><?=$form['date']?> </div>
                      <div class="col-6" style="text-align:right;"><?=$form['dept_name']?></div>
                    </div>
                    <div style="text-align:center;"><i><b><?=str_pad($form['int_id'], 5, '0', STR_PAD_LEFT)?></b></i></div>
                    <div style="text-align:center;"><?=$form['chr_title']?></div>
                  </a>
                <div><button class="btn btn-custom-3 btn-lg btn-block"
                             data-id="<?=$form['int_id']?>"
                             data-title="<?=$form['chr_title']?>"
                             data-toggle="modal"
                             data-target="#formModal">
                        大量申請
                    </button></div>
                <br>
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
$('#formModal').on('show.bs.modal', function (e) {
  let title = $(e.relatedTarget).data('title');
  $('#form-title').html(title);
});

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

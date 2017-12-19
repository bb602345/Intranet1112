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

#repair-form {font-size: 24px; display:none; }
#repair-form div.row { margin-bottom: 4px; }
#repair-form div {font-size: 1em; }
#repair-form input {width:200px; }
#repair-form select {width:200px; }

#non-finish-table {font-size: 18px; }
#non-finish-table > div.row > div { border:1px solid #9F9F9F;  background-color: #CCFFFF}

#finish-table {font-size: 18px; }
#finish-table > div.row > div { border:1px solid #9F9F9F;  background-color: #CCFFFF}

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
  #repair-form div {font-size: 0.8em; }
}

</style>
<div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        </br></br>
        <li class="sidebar-brand"><h4>報告</h4></li>
        <li><a class="<?php if($reportID == '1'): echo "active"; endif; ?>" href="/report/LawEnforcement">執法部門巡查報告</a></li>
        <li><a class="<?php if($reportID == '2'): echo "active"; endif; ?>" href="/report/itservice">IT求助報告</a></li>
        <li><a class="<?php if($reportID == '3'): echo "active"; endif; ?>" href="/report/consign">物流托運</a></li>
        <li><a class="<?php if($reportID == '4'): echo "active"; endif; ?>" href="/report/RepairProject">維修報告</a></li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

<!-- /#wrapper -->

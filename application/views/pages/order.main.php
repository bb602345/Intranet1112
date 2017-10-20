<style>
  .row {width: 100%; margin:auto; }
  .row > div { width:100%; border:solid 0px red; padding:1px;}
  .row > div > button { border-radius: 0px; width:100%;}
  a:hover { color: #EAEA00; }
  .btn-custom-1 { background-color: #7D0101; color: #FFF; padding-top:20px; padding-bottom: 20px;}
  .btn-custom-2 { background-color: #7D5001; color: #FFF; }
</style>
<h4><u>部門</u></h4>
<div class="row">
  <?php foreach($dept as $index=>$d) : ?>
  <div class="col-6 col-sm-4">
    <a href="/order/dept/<?=$index?>" class="btn btn-custom-1 btn-lg btn-block">
      <?=$d['chr_dept_name']?>
    </a>
  </div>
<?php endforeach ?>
</div>

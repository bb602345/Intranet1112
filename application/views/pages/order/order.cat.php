<style>
  .row {width: 100%; margin:auto; }
  .row > div { width:100%; border:solid 0px red; padding:1px;}
  .row > div > button { width:100%;}
  a:hover { color: #EAEA00; }
  button.btn-custom-3:hover{ color: #EAEA00; }
  .btn-custom-1 { background-color: #7D0101; color: #FFF;}
  .btn-custom-2 { background-color: #7D5001; color: #FFF; padding-top:12px; padding-bottom: 12px;}
  .btn-custom-3 { background-color: #017D01; color: #FFF; font-size: 15px;}
  .btn-custom-5 { background-color: #110169; color: #FFF; padding-top:12px; padding-bottom: 12px;}
  .modal-lg { margin:30px auto;}
  @media (min-width: 576px) { .btn-custom-3 {font-size: 18px;} }
</style>
<div class="row">
  <div class="col-6">
    <a href=<?=$back?> class="btn btn-custom-2 btn-lg btn-block">返回 <?=$dept[$picked_dept]['chr_dept_name']?></a>
  </div>
  <div class="col-6">
    <a href="/order/list" class="btn btn-custom-5 btn-lg btn-block">今天已落柯打</a>
  </div>
</div>
<br>
<h4><u><?=$cat[$picked_cat]['chr_cat_name']?></u></h4>

<div class="row">
  <?php foreach($menu as $index=>$item) : ?>
  <div class="col-6 col-sm-4 col-lg-3">
    <button type="button" class="btn btn-custom-3 btn-lg btn-block"
            data-item="<?=$item['int_id']?>"
            data-toggle="modal"
            data-target="#cartModal">
      <?=$item['chr_name']?>
      <br>
      <?php if($item['int_base'] != 1) : ?>
        <?=$item['int_base']?><?=$item['chr_unit']?>起
      <?php else : ?>
        &nbsp;
      <?php endif; ?>
    </button>
  </div>
<?php endforeach ?>
</div>

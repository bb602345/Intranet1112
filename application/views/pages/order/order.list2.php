<style>
  .row {width: 100%; margin:auto; font-size:14px; }
  .row > div { width:100%; border:solid 0px red; padding:1px; line-height: 24px;}
  a:hover { color: #EAEA00; }
  .btn-custom-1 { background-color: #7D0101; color: #FFF; padding-top:12px; padding-bottom: 12px;}
  .btn-custom-2 { background-color: #7D5001; color: #FFF; font-size: 14px; }
  .btn-custom-5 { background-color: #110169; color: #FFF; padding-top:12px; padding-bottom: 12px;}
  .btn-custom-6 { background-color: #880288; color: #FFF; padding-top:12px; padding-bottom: 12px;}
  @media (min-width: 576px) {
    .btn-custom-2 {font-size: 18px;}
    .row {font-size: 18px; }
    .row > div { line-height: 28px; }
  }


  .btn-custom-4 {
    height: 33px;
    width: 33px !important;
    border-radius: 0;
    padding: 0px 0px;
    font-size: 20px;
  }
  .CartUnit, .CartItem{
    display: inline-block;
    vertical-align: middle;
  }
  .CartQty{ vertical-align:middle;}
</style>

<a href="<?=$back?>" class="btn btn-custom-5 btn-lg btn-block">返回</a>
<br/>

<?php if(isset($orders)) : ?>
  <h3>今天已截單柯打</h3>
<?php
  $count = 1;
  $cuttime = '0000';
  foreach($orders as $order) :
    if($cuttime != $order['int_cut_time']) :
      $cuttime = $order['int_cut_time'];
      $count = 1;
?>
<br/>
<h5><u>
  ** <?=substr($cuttime, 0, 2)?>:<?=substr($cuttime, -2)?> 截單 **
</u></h5>
<?php endif; ?>


<div class="row" style="margin-top:8px;">
    <div class="col-1" style="padding-left:10px;">
      <b><?=$count?></b>
    </div>
    <div class="col-5">
      <span class="CartItem"><?=$order['chr_name']?> - (<?=$order['int_base']?><?=$order['chr_unit']?>起)</span>
    </div>
    <div class="col-5" align="center">

      <?=$order['int_qty']?>
      <span class="CartUnit"><?=$order['chr_unit']?></span>

    </div>
    <div class="col-1" align="right"></div>
</div>
<?php
    $count++;
  endforeach;
?>
<?php else: ?>
    <h3><u>今天未有任何柯打</u></h3>
<?php endif;?>

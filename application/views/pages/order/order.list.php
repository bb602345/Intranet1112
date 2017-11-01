<style>
  .row {width: 100%; margin:auto; font-size:14px; }
  .row > div { width:100%; border:solid 0px red; padding-left:1px; padding-right:1px; line-height: 24px;}
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
<div class="row">
  <div class="col-6">
    <a href="<?=$back?>" class="btn btn-custom-5 btn-lg btn-block">返回</a>
  </div>
  <div class="col-6">
    <a href="/order/list2" class="btn btn-custom-6 btn-lg btn-block">查看已截單柯打</a>
  </div>
</div>
<br/>

<?php if(isset($orders)) : ?>
  <h3>今天已落柯打</h3>
<?php
  $count = 1;
  $cuttime = '0000';
  foreach($orders as $order) :
    if($cuttime != $order['int_cut_time']) :
      $cuttime = $order['int_cut_time'];
      $count = 1;
      $flag = (date("Hi", gettimeofday("sec")) <= $cuttime);
?>
<br/>
<h5><u>
  ** <?=substr($cuttime, 0, 2)?>:<?=substr($cuttime, -2)?> 截單 **
<?php if(!$flag) : echo "(下次截單日) "; endif; ?>
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
      <button class="CartBtn btn-custom-4 btn btn-danger btn-xs" data-type="sub" data-base="<?=$order['int_base']?>" data-item="<?=$order['int_id']?>">-</button>
      <input class="CartQty" id="CartQty-<?=$order['int_id']?>" type="tel" data-base="<?=$order['int_base']?>" data-item="<?=$order['int_id']?>" value="<?=$order['int_qty']?>" size="3" style="text-align:right;"/>
      <span class="CartUnit"><?=$order['chr_unit']?></span>
      <button class="CartBtn btn-custom-4 btn btn-success btn-xs" data-type="add" data-base="<?=$order['int_base']?>" data-item="<?=$order['int_id']?>">+</button>
    </div>
    <div class="col-1" align="right">
    <button type="button" class="CartBtn close" aria-label="Close" style="margin-right:10px;" data-type="del" data-item="<?=$order['int_id']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
</div>
<?php
    $count++;
  endforeach;
?>
<?php else: ?>
    <h3><u>今天未有任何柯打</u></h3>
<?php endif;?>

<script>
$('.CartBtn').on('click', function(e){
  let btnType = $(this).data('type');
  let itemID = $(this).data('item');
  let base = parseInt($(this).data('base'));
  let val = parseInt($('#CartQty-' + itemID).val());
  let newVal = 0;
  switch(btnType){
    case 'add':
      $('#CartQty-' + itemID).val(val + base);
      newVal = val + base;
      break;
    case 'sub':
      if(val - base >= 0){
        $('#CartQty-' + itemID).val(val - base);
        newVal = val - base;
      }
      break;
    case 'del':
      newVal = 0;
      break;
  }
  let setting = {
    url: "/order/item/set/" + itemID + "/" + newVal,
    type: 'PUT'
  }
  if(newVal == 0){
    setting['success'] = function(resp){
      console.log("ss");
      location.reload();
    }
  }
  $.ajax(setting);

});
</script>

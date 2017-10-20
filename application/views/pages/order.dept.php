<?php
function get_chinese_weekday($weekday){
    return ['日', '一', '二', '三', '四', '五', '六'][$weekday];
}
function get_explode_chinses_weekday($weekday){
  $wd = explode(',', $weekday);
  $str = '';
  foreach($wd as $w)
    $str .= ' ' . get_chinese_weekday($w) . ',';
  $str = substr($str, 0, strlen($str) - 1);
  return $str;
}
?>
<style>
  .row {width: 100%; margin:auto; }
  .row > div { width:100%; border:solid 0px red; padding:1px;}
  .row > div > button { border-radius: 0px; width:100%;}
  a:hover { color: #EAEA00; }
  .btn-custom-1 { background-color: #7D0101; color: #FFF; padding-top:12px; padding-bottom: 12px;}
  .btn-custom-2 { background-color: #7D5001; color: #FFF; font-size: 14px; }
  @media (min-width: 576px) { .btn-custom-2 {font-size: 18px;} }
</style>
<a href=<?=$back?> class="btn btn-custom-1 btn-lg btn-block">返回 部門</a>
<br>
<h4><u><?=$dept[$picked_dept]['chr_dept_name']?></u></h4>

<div class="row">
  <?php foreach($cat as $index=>$c) : ?>
  <div class="col-6 col-sm-4">
    <a href="/order/dept/<?=$picked_dept?>/cat/<?=$index?>" class="btn btn-custom-2 btn-lg btn-block">
      <b><u><?=$c['chr_cat_name']?></u></b>
      <br/>

      前<?=$c['chr_cut_date']?>天
      <?=substr($c['int_cut_time'], 0, 2)?>:<?=substr($c['int_cut_time'], -2)?>
      截單
      <br/>

      <?php if($c['chr_deli_date'] == '0-6') : ?>
        <i>每天出貨</i>
      <?php elseif(strpos($c['chr_deli_date'], '-') !== false ): ?>
        <i>星期 <?=get_chinese_weekday($c['chr_deli_date'][0])?>
           至   <?=get_chinese_weekday($c['chr_deli_date'][2])?> 出貨</i>
      <?php elseif(strpos($c['chr_deli_date'], ',') !== false ): ?>
        <i>逢星期<?=get_explode_chinses_weekday($c['chr_deli_date'])?> 出貨</i>
      <?php endif;?>
    </a>
  </div>
<?php endforeach ?>
</div>

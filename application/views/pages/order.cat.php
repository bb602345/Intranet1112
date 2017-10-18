<style>
  .row > div { width:100%; border:solid 0px red; padding:1px;}
  .row > div > button { border-radius: 0px; width:100%;}
  .btn-custom-1 { background-color: #7D0101; color: #FFF;}
  .btn-custom-2 { background-color: #7D5001; color: #FFF; padding-top:12px; padding-bottom: 12px;}
  .btn-custom-3 { background-color: #017D01; color: #FFF;}
</style>
<a href=<?=$back?> class="btn btn-custom-2 btn-lg btn-block">返回 <?=$dept[$picked_dept]['chr_dept_name']?></a>
<br>
<h4><u><?=$cat[$picked_cat]['chr_cat_name']?></u></h4>

<div class="row">
  <?php foreach($menu as $index=>$item) : ?>
  <div class="col-6 col-sm-4">
    <a href="#" class="btn btn-custom-3 btn-lg btn-block">
      <?=$item['chr_name']?>
    </a>
  </div>
<?php endforeach ?>
</div>

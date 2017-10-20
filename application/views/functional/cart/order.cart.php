<style>
  .modal-body > .row > div {font-size: 1em; padding:10px 5px; line-height: 28px;}
  .modal-body > .row > div > .CartQty { line-height: initial; height: 28px; vertical-align: middle;}

  .modal-body > .row {font-size: 12px; }
  @media (min-width: 576px) { .modal-body > .row {font-size: 14px;} }
  @media (min-width: 992px) { .modal-body > .row {font-size: 16px;} }

  .btn-custom-4 {
    height: 28px;
    width: 28px !important;
    border-radius: 100%;
    padding: 0px 0px;
    font-size: 20px;
    line-height: 0;
  }
  .CartUnit, .CartItem{
    line-height: 28px;
    display: inline-block;
    vertical-align: middle;
  }
  .modal-body-custom-1{ padding:0px; }

</style>

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cart" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">柯打項目</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!--<form method="POST" action="">-->
    <div id="modal-body" class="modal-body modal-body-custom-1"></div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary">提交柯打</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
$('#cartModal').on('show.bs.modal', function (e) {
  let itemID = $(e.relatedTarget).data('item');
  let setting = {
    url: "/order/item/add/" + itemID,
    type: "POST",
    success: callbackSuccess,
  }
  $.ajax(setting);
});

function initOnInput(){
  $('.CartQty').on('blur', function(e){
    let itemID = $(this).data('item');
    let setting = {
      url: "/order/item/set/" + itemID + "/" + $(this).val(),
      type: "POST",
      success: callbackSuccess,
    }
    $.ajax(setting);
  });
}
function initBtnClick(){
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
        type: "POST"
      }
      if(newVal == 0)
        setting['success'] = callbackSuccess;
      $.ajax(setting);

    });
}

function callbackSuccess(data){
  $("#modal-body").html(data);
  initOnInput();
  initBtnClick();
}
</script>

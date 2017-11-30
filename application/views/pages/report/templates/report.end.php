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

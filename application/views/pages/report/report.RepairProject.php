<div id="page-content-wrapper">
  <h1>維修報告</h1></br>

  <div class="row">
    <button id="repair-form-slide" class="col-11 btn btn-success mx-auto" style="font-size:24px;">新輸入</button></br></br>
  </div>
  </br>
  <div id="repair-form">
    <div class="row">
      <div class="col-4 col-sm-3">日期:</div>
      <div class="col-6"></div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">分店/部門:</div>
      <div class="col-6"><?=$_SESSION['login_user']['chr_name']?></div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">緊急性:</div>
      <div class="col-6">
        <select>
          <option>-- 請選擇 --</option>
          <option>高</option>
          <option>中</option>
          <option>低</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">位置:</div>
      <div class="col-6">
        <select>
          <option>-- 請選擇 --</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">維修項目:</div>
      <div class="col-6">
        <select>
          <option>-- 請選擇 --</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">求助事宜:</div>
      <div class="col-6">
        <select>
          <option>-- 請選擇 --</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">機器號碼#:</div>
      <div class="col-6"><input type="text"/></div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">聯絡人:</div>
      <div class="col-6"><input type="text"/></div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">其他資料提供:</div>
      <div class="col-6"><input type="text"/></div>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3">上傳文檔(如有):</div>
      <div class="col-6">
        <input name="pic" type="file" accept="image/*;capture=camera">
      </div>
    </div>
    </br>
    <div class="row">
      <div class="col-9">
        <button class="btn btn-primary" style="font-size:22px; width:150px;">提交</button>
      </div>
    </div>
  </div>

  </br>
  <hr>
  </br>

  <div id="non-finish-table" align="center" >
    <h5 style="font-size:24px;">未完成處理</h5>
    <h5 style="font-size:18px;color:red;">沒有任何記錄</h5>
    <div class="row" style="display:none">
        <div class="col-1">#</div>
        <div class="col-2">編號</div>
        <div class="col-4">日期</div>
        <div class="col-2">位置</div>
        <div class="col-2">項目</div>
        <div class="col-1"></div>
    </div>

  </div>
  </br></br>

  <div id="finish-table" align="center" style="margin-bottom:50px;">
    <h5 style="font-size:24px;">最近14天內完成處理</h5>
    <h5 style="font-size:18px;color:red;">沒有任何記錄</h5>
    <div class="row" style="display:none">
        <div class="col-1">#</div>
        <div class="col-2">編號</div>
        <div class="col-4">日期</div>
        <div class="col-2">位置</div>
        <div class="col-2">項目</div>
        <div class="col-1"></div>
    </div>
  </div>

</div>
<script>
  $("#repair-form-slide").click(function(){
    $('#repair-form').slideToggle(200);
  });
  
</script>

</div>

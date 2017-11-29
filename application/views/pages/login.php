<div class="container">

  <div class="starter-template">
    <br>
    <h2>蛋撻王控股有限公司</h2>
    <?php if(isset($message)) :?>

      <?php if($message === 'LOGIN_FAIL') : ?>
        <h3 style="color:red">密碼錯誤，請重試！</h3>
      <?php elseif($message === 'LOGIN_FIRST'): ?>
        <h3 style="color:red">請先登入</h3>
      <?php endif; ?>
    <?php else: ?>
      <h3>登入</h3>
    <?php endif; ?>
    <br />
    <?php echo form_open('user/login'); ?>
      <label for="title" style="width:100px;">電郵地址</label>
      <input style="width:200px;" type="input" name="name" />
      <br />

      <label for="text" style="width:100px;">密碼</label>
      <input style="width:200px;" type="password" name="password" />
      <br />
      <br />
      <input type="submit" name="submit" value="登入" />
    </form>
  </div>

</div>

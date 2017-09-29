<div class="container">

  <div class="starter-template">
    <h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>


    <?php if(!isset($_SESSION['login_user'])):
      echo form_open('user/login'); ?>
      <label for="title">Login Name</label>
      <input type="input" name="name" />
      <br />

      <label for="text">Password</label>
      <input type="password" name="password" />
      <br />

      <input type="submit" name="submit" value="Login" />
    </form>
    <?php endif;?>
  </div>

</div>

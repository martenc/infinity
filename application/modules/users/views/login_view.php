<?php
$this->load->helper('form');
?>
<div class="form login-form" id="login-form">
  <?php echo form_open('users/dologin', 'class="form"'); ?>

  <label>Email Addrress:</label>
  <input type="text" name="username" placeholder="Enter your email address">

  <label>Password:</label>
  <input type="password" name="password" placeholder="password">

  <label></label>
  <button class="btn btn-success" name="login" value="login">Login</button>

  <?php echo form_close(); ?>
</div>
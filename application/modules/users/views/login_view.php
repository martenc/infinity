<?php
$this->load->helper('form');
?>
<div class="form login-form" id="login-form">
    <?php echo form_open('users/dologin'); ?>

    <input type="text" placeholder="Type something…">

    <?php echo form_close(); ?>
</div>
<?php
$message = $this->session->flashdata('message') or "";
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <small><?php echo $message;  ?></small>
        <form method="post" action="<?= base_url('auth'); ?>">
            <input type="text" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>"><br>
            <?= form_error('email') ?>
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <?= form_error('password') ?>
            <button type="submit" >Login</button>
        </form>
        <br>
        <a href="<?= base_url("auth/register"); ?>">Create account</a>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="<?= base_url('auth/register'); ?>">
            <input type="text" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>"><br>
            <?= form_error('name'); ?>
            <input type="text" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>"><br>
            <?= form_error('email'); ?>
            <input type="password" id="password1" name="password1" placeholder="Password"><br>
            <?= form_error('password1'); ?>
            <input type="password" id="password2" name="password2" placeholder="Repeat Password"><br>
            <button type="submit">Register</button>
        </form>
        <br>
        <a href="<?= base_url("auth"); ?>" >Login instead!</a>

    </body>
</html>
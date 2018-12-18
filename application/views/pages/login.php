<div id="login"></div>
<main>
    <h2>Login</h2>
    <p>Required information is marked with an asterisk(*)</p>
    <?php echo validation_errors(); ?>

    <?php echo form_open('login/login_user'); ?>

    <?php if($this->session->flashdata('message')): ?>
        <p><h4 style="color:green;"> <?php echo $this->session->flashdata('message'); ?></h3></p>
    <?php endif; ?>

    <?php echo form_label('* Email: '); ?>
    <?php echo form_input(array('id' => 'email', 'name' => 'email')); ?><br>

    <?php echo form_label('* Password: '); ?>
    <?php echo form_input(array('id' => 'password', 'name' => 'password')); ?><br>

    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
    <?php echo form_close(); ?><br>

</main>

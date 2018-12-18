<div id="client"></div>
<main>
    <h2>My Pet</h2>
    <p>Required information is marked with an asterisk(*)</p>
    <?php echo validation_errors(); ?>

    <?php echo form_open('login_client/login_client'); ?>

    <?php if($this->session->flashdata('message')): ?>
        <p><h3 style="color:green;"> <?php echo $this->session->flashdata('message'); ?></h3></p>
    <?php endif; ?>

    <?php echo form_label('* Pets name: '); ?>
    <?php echo form_input(array('id' => 'pname', 'name' => 'pname')); ?><br>

    <?php echo form_label('* DOB: '); ?>
    <?php echo form_input(array('id' => 'dob', 'name' => 'dob')); ?><br>

    <?php echo form_label('Color: '); ?>
    <?php echo form_input(array('id' => 'color', 'name' => 'color')); ?><br>

    <?php echo form_label('Favorite Food: '); ?>
    <?php echo form_input(array('id' => 'food', 'name' => 'food')); ?><br>

    <?php echo form_submit(array('id' => 'submit', 'value' => 'Add Pet')); ?>
    <?php echo form_close(); ?><br>

</form>
</main>

<div id="contact"></div>
<main>
    <h2>Contact Us</h2>
    <p>Required information is marked with an asterisk(*)</p>
    <?php echo validation_errors(); ?>

    <?php echo form_open('contacts/contact_us'); ?>

    <?php if($this->session->flashdata('message')): ?>
        <p><h4 style="color:green;"> <?php echo $this->session->flashdata('message'); ?></h3></p>
    <?php endif; ?>

    <?php echo form_label('* First Name: '); ?>
    <?php echo form_input(array('id' => 'fname', 'name' => 'fname')); ?><br>

    <?php echo form_label('* Last Name: '); ?>
    <?php echo form_input(array('id' => 'lname', 'name' => 'lname')); ?><br>

    <?php echo form_label('* Email: '); ?>
    <?php echo form_input(array('id' => 'email', 'name' => 'email')); ?><br>

    <?php echo form_label('Phone: '); ?>
    <?php echo form_input(array('id' => 'phone', 'name' => 'phone')); ?><br>

    <?php echo form_label('* Comments: '); ?>
    <?php echo form_textarea(array('rows' => '5', 'cols' => '50', 'name' => 'comments')); ?><br>

    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
    <?php echo form_close(); ?><br>

</main>














				ab

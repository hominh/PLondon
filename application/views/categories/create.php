<h2>Add new category</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('categories/create') ?>
	<label for="title">Title</label>
	<input type="input" name="title" /><br />
</form>
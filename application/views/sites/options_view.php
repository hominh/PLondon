<h2>Create a data</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('site/create') ?>
	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="text">Content</label>
	<textarea name="content"></textarea><br />

	<input type="submit" name="submit" value="Add new data" />

</form>
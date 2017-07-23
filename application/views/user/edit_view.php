<form action="<?php echo base_url(); ?>index.php/users/edit/<?php echo $info['id']; ?>" method="post" id="categories">
       <?php
        echo "<div class='mess_error'>";
        echo "<ul>";
            if(validation_errors() != ''){
                echo "<li>".validation_errors()."</li>";
            }
        echo "</ul>";
        echo "</div>";
        ?>
    <fieldset class="show">
        <legend align="center">Edit Username: <?php echo $info['username']; ?></legend>
       
        <label>Username:</label><input type="text" name="username" value="<?php echo $info['username']; ?>" size="28" class="input"/>
        <label>Email:</label><input type="text" name="email" size="28" value="<?php echo $info['email']; ?>" class="input"/>
        <label>Password:</label><input type="password" name="password" size="28" class="input"/>
        <label>Re-Pass:</label><input type="password" name="password2" size="28" class="input"/><br />
        
        <label>Level:</label><select name="level">
            <option value='1' <?php if ($info['level'] == 1) echo ' selected ';  ?> >Member</option>
            <option value='2'  <?php if ($info['level'] == 2) echo ' selected ';  ?> >Administrator</option>
        </select></br />
        <label>&nbsp;</label><input type="submit" name="ok" value="Edit User" class="btn" />
    </fieldset>
</form>

<?php foreach ($data_id as $row) : ?>

<h2>Update</h2>
<form method="get">
    <label for="Title">Title</label>
    <input type="text" name="Title" value="<?php echo $row['Title']; ?>" required><br>
    <label for="Pay">Pay</label>
    <input type="number" name="Pay" step=".01" value="<?php echo $row['Pay']; ?>" required><br>
    <label for="Location">Location</label>
    <input type="text" name="Location" value="<?php echo $row['Location']; ?>" required><br>
    <label for="Response">Response</label>
    <input type="text" name="Response" value="<?php echo $row['Response']; ?>"required><br>
    <label for="Notes">Notes</label>
    <textarea name="Notes"  cols="30" rows="10"required><?php echo $row['Notes']; ?></textarea><br>
    <input type="hidden" name='action' value='update'>
    <input type="hidden" name='id' value="<?php echo $row['id']; ?>">
    <input type="hidden" name='hidden_update' value="done">
    <input type="submit" value="Update Job">
</form>
<?php endforeach; ?>
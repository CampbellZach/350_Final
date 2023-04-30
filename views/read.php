<head>
    <link rel="stylesheet" href="styles/read.css">
</head>
<h1>My Jobs</h1>
<div class="read">
    <table>
        <tr>
            <td>Title</td>
            <td>Pay</td>
            <td>Location</td>
            <td>Response</td>
            <td>Notes</td>
        </tr>
        <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row['Title']; ?></td>
                <td><?php echo $row['Pay']; ?></td>
                <td><?php echo $row['Location']; ?></td>
                <td><?php echo $row['Response']; ?></td>
                <td><?php echo $row['Notes']; ?></td>
                <td>
                    <form action='index.php' method="get">
                        <input type="hidden" name='action' value='update'>
                        <input type="hidden" name='id' value="<?php echo $row['id']; ?>">
                        <input type="submit" value='update'>
                    </form>
                </td>
                <td>
                    <form action='index.php' method="get">
                        <input type="hidden" name='action' value='delete'>
                        <input type="hidden" name='id' value="<?php echo $row['id']; ?>">
                        <input type="submit" value='delete'>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>

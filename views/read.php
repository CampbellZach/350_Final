<<<<<<< HEAD
<h1>READ</h1>
<div>
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
                    <form action='controller.php' method="POST">
                        <input type="hidden" name='update' value="<?php echo $row['id']; ?>">
                        <input type="submit" value='update'>
                    </form>
                </td>
                <td>
                    <form action='controller.php' method="POST">
                        <input type="hidden" name='delete' value="<?php echo $row['id']; ?>">
                        <input type="submit" value='delete'>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
=======
<table>
    <tr>
        <th>Username</th>
        <th>Password Hash</th>
    </tr>
    <?php
        foreach ($accounts as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
    ?>
</table>
>>>>>>> 5642899b437ad4d641b8285cdca7b2fd91bdb972

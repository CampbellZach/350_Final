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
<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-25
 * Time: 20:05
 */

require 'config.php';

try {
    $query = 'SELECT name, type, description, username, FROM venues ORDER BY id';

    $stmt = $conn->prepare($query);
    $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Couldn't connect to $dbname :" . $e->getMessage());
}
?>

<table class="venues_table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Desc</th>
        <th>Username</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']) ?></td>
            <td><?php echo htmlspecialchars($row['type']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
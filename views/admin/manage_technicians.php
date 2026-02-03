<?php
require 'db/database.php';

// Fetch technicians
$sql = "SELECT techID, firstName, lastName, email, phone FROM technicians";
$technicians = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

include 'views/header.php';
?>

<h2 class="mb-3">Technician List</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($technicians as $tech): ?>
            <tr>
                <td><?= htmlspecialchars($tech['firstName']) ?></td>
                <td><?= htmlspecialchars($tech['lastName']) ?></td>
                <td><?= htmlspecialchars($tech['email']) ?></td>
                <td><?= htmlspecialchars($tech['phone']) ?></td>
                <td>
                    <form action="delete_technician.php" method="post">
                        <input type="hidden" name="techID" value="<?= $tech['techID'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="add_technician.php" class="btn btn-primary">Add Technician</a>

<?php include 'views/footer.php'; ?>
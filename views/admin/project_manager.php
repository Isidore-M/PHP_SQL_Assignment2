<?php
require 'db/database.php';

// Fetch customers from the database
$sql = "SELECT customerID, firstName, lastName, email, city FROM customers";
$customers = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

include 'views/header.php';
?>

<h2 class="mb-3">Customer List</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= htmlspecialchars($customer['firstName']) ?></td>
                <td><?= htmlspecialchars($customer['lastName']) ?></td>
                <td><?= htmlspecialchars($customer['email']) ?></td>
                <td><?= htmlspecialchars($customer['city']) ?></td>
                <td>
                    <form action="delete_customer.php" method="post">
                        <input type="hidden" name="customerID" value="<?= $customer['customerID'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="search_customers.php" class="btn btn-primary">Search Customers</a>

<?php include 'views/footer.php'; ?>
<?php
/*
### 4) Admin Page

Create an admin page that:

- Displays **all registration records** from the database in a table 
- Allows the admin to **update** and **delete** records as needed 

---*/
require "connect.php";
$sql = "SELECT * FROM registration ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$eventGoers = $stmt->fetchAll();
?>
<main>
    <h2> users registered (admin)</h2>
    <?php if (empty($registration)): ?>
        <p> no users yet.</p>
    <?php else:?>
        <div>
            <table>
                <thead>
                    <tr>
                    <th>first name</th>
                    <th>last name</th>
                    <th>email</th>
                    <th>phone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= htmlspecialchars(['id']);?></td>
                        <td><?= htmlspecialchars($eventGoer['first_name']);?>
                        <?= htmlspecialchars($eventGoer['last_name']);?>
                        </td>
                        <td><?= htmlspecialchars($eventGoer['email']);?></td>
                       <td> <?= htmlspecialchars($eventGoer['phone']);?></td>
                    <td>
                        <a class="btn btn-sm btn-warning"
                        href="update.php?id=<?= urlencode($eventGoer['id']);?> " 
                        >
                        update
     
    </a>
    <a class="btn btn-sm btn-danger mt-2"
    href="delete.php?id=<?= urlencode($eventGoer['is']);?>"
    onclick="return confirm('are you sure you want to delete')";>
    delete</a>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    <?php endif;?>
    </main>

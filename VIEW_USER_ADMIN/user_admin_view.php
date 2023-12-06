<?php
include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';
$c= new controller_user_admin();
$tab = $c->ListUsers();
?>
<table border="1" allign="center" width="70%">
    <tr>
        <th>Id</th>
        <th>First Name </th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Rassword</th>
        <th>Role</th>
    </tr>
    <?php
        foreach ($tab as $user) {
            ?>
                <tr>
                    <td><?php echo $user['id_user']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['date_of_birth']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                </tr>
            <?php
            }
            ?>
</table>
<?php
include_once '../../config.php';

if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Get the last archived user's ID
    $sqlLastArchivedUser = "SELECT MAX(idUser) AS lastArchivedUserId FROM archived_users";
    $resultLastArchivedUser = $conn->query($sqlLastArchivedUser);

    if ($resultLastArchivedUser && $row = $resultLastArchivedUser->fetch_assoc()) {
        $lastArchivedUserId = $row['lastArchivedUserId'];
        // Calculate the new ID for the archived user
        $newArchivedUserId = $lastArchivedUserId + 1;

        // Add logic to archive the user (e.g., insert into archived_users table with the new ID)
        $sqlArchiveUser = "INSERT INTO archived_users SELECT * FROM user WHERE idUser = $userId";
        $resultArchiveUser = $conn->query($sqlArchiveUser);

        if ($resultArchiveUser) {
            // Update the ID of the newly archived user in the archived_users table
            $sqlUpdateArchivedUserId = "UPDATE archived_users SET idUser = $newArchivedUserId WHERE idUser = $userId";
            $resultUpdateArchivedUserId = $conn->query($sqlUpdateArchivedUserId);

            if ($resultUpdateArchivedUserId) {
                // Delete the user from the original table
                $sqlDeleteUser = "DELETE FROM user WHERE idUser = $userId";
                $resultDeleteUser = $conn->query($sqlDeleteUser);

                if ($resultDeleteUser) {
                    // Send a success message back to the client
                    echo 'User with ID: ' . $userId . ' has been archived with new ID: ' . $newArchivedUserId;
                } else {
                    // Send an error message back to the client if deletion fails
                    echo 'Failed to delete user from the original table.';
                }
            } else {
                // Send an error message back to the client if updating the ID fails
                echo 'Failed to update archived user ID.';
            }
        } else {
            // Send an error message back to the client if archiving fails
            echo 'Failed to archive user.';
        }
    } else {
        // Send an error message back to the client if fetching the last archived user's ID fails
        echo 'Failed to fetch last archived user ID.';
    }
} else {
    // Send an error message back to the client if userId is not set
    echo 'Invalid request.';
}

?>

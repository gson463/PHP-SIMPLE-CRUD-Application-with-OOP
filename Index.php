//Coded by Security Flaws (IT-G)
//2023

<?php
require_once('Class.php');

$user = new User();

// Handle add user form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Create user
    $result = $user->createUser($name, $email);

    if ($result) {
        echo "User created successfully!";
    } else {
        echo "Failed to create user.";
    }
}

// Handle delete user form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $id = $_POST['delete_user'];

    // Delete user
    $result = $user->deleteUser($id);

    if ($result) {
        echo "User deleted successfully!";
    } else {
        echo "Failed to delete user.";
    }
}

// Handle update user form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update user
    $result = $user->updateUser($id, $name, $email);

    if ($result) {
        echo "User updated successfully!";
    } else {
        echo "Failed to update user.";
    }
}

// Get all users
$users = $user->getAllUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Application</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>CRUD Application</h1>

        <div>
            <h2>User List</h2>
            <?php if (!empty($users)) : ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $userData) : ?>
                            <tr>
                                <td><?php echo $userData['name']; ?></td>
                                <td><?php echo $userData['email']; ?></td>
                                <td>
                                    <form method="post" action="Index.php">
                                        <input type="hidden" name="delete_user" value="<?php echo $userData['id']; ?>">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                    <form method="post" action="Index.php">
                                        <input type="hidden" name="user_id" value="<?php echo $userData['id']; ?>">
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" name="name" value="<?php echo $userData['name']; ?>" class="form-control">
                                            </div>
                                            <div class="col">
                                                <input type="email" name="email" value="<?php echo $userData['email']; ?>" class="form-control">
                                            </div>
                                            <div class="col">
                                                <input type="submit" name="update_user" value="Update" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No usersfound.</p>
<?php endif; ?>
</div>
<div>
        <h2>Add User</h2>
        <form method="post" action="Index.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <input type="submit" name="add_user" value="Add User" class="btn btn-primary">
        </form>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

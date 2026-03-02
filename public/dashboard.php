<?php 
include "../app/db.php";
include "../app/functions.php";

requireLogin() ;

$user = $_SESSION["user"];

$stmt = $conn->prepare("
SELECT * FROM urls WHERE user_id=? ORDER BY id DESC");

$stmt -> bind_param("i", $user);
$stmt -> execute();

$result = $stmt->get_result();

?>

<h2>
    Dashboard
</h2>

<a href="../auth/logout.php">Login</a>

<form action="create.php"  method="post">
    <input name="url" plsceholder="Enter Url" required>
    <input type="datetime-local" name="expiry">
    <button>Create</button>
</form>

<table border="1">
    <tr>
        <th>Short</th>
        <th>Clicks</th>
        <th>QR</th>
        <th>Delete</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td>
                <a target="_black" href="<?php echo $row["short_code"];?>">
                    <?php echo $row["clicks"];?>
                </a>
            </td>

            <td>
                <a href="qr.phpc=<?php echo $row["short_code"];?>">
                    QR
                </a>
            </td>

            <td>
                <a href="delete.php?id=<?php echo $row['id']; ?>">
                    Delete
                </a>
            </td>
        </tr>

        <?php } ?>
</table>
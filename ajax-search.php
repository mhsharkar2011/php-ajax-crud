<?php
include "database/Database.php";
?>
<?php
$search_value = $_POST["search"];

$db = new Database();

$query = "SELECT * FROM users WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%' OR email LIKE '%{$search_value}%' ORDER BY id DESC";
$result = $db->select($query) or die("SQL Query Failed: ");
$rowCount = mysqli_num_rows($result);
echo "Row count: $rowCount";
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '<table class="tblone" border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                <th>Serial</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
                </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
        <tr>
        <td align='center'>{$row["id"]}</td>
        <td>{$row["first_name"]} {$row["last_name"]}</td>
        <td>{$row["email"]}</td>
        <td align='center'>
        <button class='btn btn-sm btn-warning edit-btn' data-eid='{$row['id']}'><i class='fa-solid fa-pencil'></i></button>
        <button type='submit' class='btn btn-sm btn-danger' id='delete-btn' data-id='{$row['id']}'><i class='fa-solid fa-trash'></i></button>
        </td></tr>";
    }
    $output .= "</table>";
    mysqli_close($db->link);
    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
}

?>

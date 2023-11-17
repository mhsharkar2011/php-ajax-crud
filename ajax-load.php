<?php
include "database/Database.php";

$db = new Database();
$query = "SELECT * FROM tbl_user ORDER BY id DESC LIMIT 5";
$result = $db->select($query);

if (!$result) {
    die("SQL Query Failed." . $db->error);
}
$rowCount = mysqli_num_rows($result);
echo "Row count: $rowCount";
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '<table class="tblone" >
              <tr style="text-align:center;">
                <th>SL No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th width="90px">Action</th>
              </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
                <tr>
                <td align='center'>{$row["id"]}</td>
                <td>{$row["first_name"]} {$row["last_name"]}</td>
                <td align='center'>{$row["email"]}</td>
                <td align='center'>
                <button class='btn btn-sm btn-warning edit-btn' data-eid='{$row['id']}'><i class='fa-solid fa-pencil'></i></button>
                <button class='btn btn-sm btn-danger delete-btn' data-id='{$row['id']}'><i class='fa-solid fa-trash'></i></button>
                </td>
                </tr>";
    }
    $output .= "</table>";

    mysqli_close($db->link);

    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
}

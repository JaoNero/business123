<?php
require "connect.php";

$cid = $_GET["CustomerID"];
$sql = "SELECT * FROM customer c INNER JOIN country co
ON c.CountryCode = co.CountryCode where CustomerID = :customerID";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':customerID', $cid);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$conn = null;
?>
<table width="800" border="1">
    <tr>
        <th width="90">
            <div align="center">รหัสผู้ใช้ </div>
        </th>
        <th width="140">
            <div align="center">ชื่อ </div>
        </th>
        <th width="120">
            <div align="center">ยอดหนี้ </div>
        </th>
        <th width="100">
            <div align="center">ประเทศ </div>
        </th>
        <th width="50">
            <div align="center">อีเมล </div>
        </th>
    </tr>

    <?php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <tr>
            <td>

                <?php echo $result["CustomerID"]; ?>

            </td>

            <td>
                <?php echo  $result["Name"]; ?>
            </td>

            <td><?php echo  $result["OutstandingDebt"]; ?></div>
            </td>
            <td><?php echo  $result["CountryName"]; ?></td>
            <td><?php echo  $result["Email"]; ?></div>
            </td>

        </tr>

    <?php
    }
    while ($row = $stmt->fetch()) {
        echo $row['CustomerID'] . ' / ' . $row['Name'] . ' / ' . $row['OutstandingDebt'] . ' / ' . $row['CountryName'] . ' / ' . $row['Email'] . "<br/>";
    }
    ?>

</table>
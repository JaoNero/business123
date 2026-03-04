<?php
require "connect.php"; //สร้างเส้นเชื่อมต่อ
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT * FROM customer"; //คำสั่ง
$stmt = $conn->prepare($sql);
$stmt->execute();


$result = $stmt->fetchAll(); //ดึงข้อมูลทั้งหมด //fetchดึงละแสดงที่ละอัน
print_r($result); //แสดงผล

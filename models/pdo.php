<?php
// Kết nối đến CSDL sử dụng PDO
function pdo_get_connection()
{
    $servername = "localhost";
    $dbname = "db_techorange";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// Chạy câu lệnh sql để (INSERT, UPDATE, DELETE)
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
// Chạy câu lệnh sql SELECT
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
// Chạy lệnh sql để lấy 1 record
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
// Chạy câu lệnh sql truy vấn 1 giá trị
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

<?php 
    include '../../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    $productId = $_GET['productId'];
    $sql = "SELECT * FROM `om_product` 
    NATURAL JOIN om_purchase WHERE productId = $productId";
    $np = array();
    $np[':pId'] = $productId;
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $records[0]['productName'] . "<br>";
    echo "<img src='" . $records[0]['productImage'] . "' width='200' /><br/>";
    foreach ($records as $record) {
        echo "Purchase Date: " . $record["purchaseDate"] . "<br />";
        echo "Unit Price: " . $record["unitPrice"] . "<br />";
        echo "Quantity: " . $record["quantity"] . "<br />";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Product History</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    </body>
</html>
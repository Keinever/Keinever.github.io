<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Zad3.css">
</head>


<body>
<table>
<thead>
<tr>
<th>name</th>
<th>id</th>
<th>review</th>
</tr>
</thead>
<tbody>

<?php include "config.php";

while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $id = $row['id'];
    $review = $row['review'];
    echo "<tr>
            <th>$name</th>
            <th>$id</th>
            <th>$review</th>
        </tr>";
}

?>


</tbody>
</table>
</body>

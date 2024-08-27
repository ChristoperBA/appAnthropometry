<?php
include("config_medidas.php");

// SELECT

$sql = "SELECT date, height_m, weight_Kg, fat_pct, water_L, muscle_Kg, bone_Kg FROM anthropometry";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='text-center'>
            <table class='table table-striped table-bordered mx-auto' style='width: 80%;'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Fecha</th>
                        <th>Altura (m)</th>
                        <th>Peso (Kg)</th>
                        <th>Grasa (%)</th>
                        <th>Agua (L)</th>
                        <th>Músculo (Kg)</th>
                        <th>Hueso (Kg)</th>
                    </tr>
                </thead>
            <tbody>"    ;
    

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["date"] . "</td>
                <td>" . $row["height_m"] . "</td>
                <td>" . $row["weight_Kg"] . "</td>
                <td>" . $row["fat_pct"] . "</td>
                <td>" . $row["water_L"] . "</td>
                <td>" . $row["muscle_Kg"] . "</td>
                <td>" . $row["bone_Kg"] . "</td>
              </tr>";
    }
        echo "</tbody></table>
        </div>";

} else {
    echo "0 results";
}

$conn->close();
?>
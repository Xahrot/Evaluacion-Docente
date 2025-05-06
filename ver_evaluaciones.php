<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
</head>
<body>
    <h2>Promedios por Docente</h2>
    <table border="1">
        <tr>
            <th>Docente</th><th>Asignatura</th><th>Promedio</th>
        </tr>
        <?php
        $sql = "SELECT d.nombre, d.asignatura, AVG(e.calificacion) as promedio
                FROM evaluaciones e
                JOIN docentes d ON e.docente_id = d.id
                GROUP BY e.docente_id";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nombre']}</td>
                    <td>{$row['asignatura']}</td>
                    <td>" . number_format($row['promedio'], 2) . "</td>
                  </tr>";
        }
        ?>
    </table>
    <a href="index.php">Volver</a>
</body>
</html>
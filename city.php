        <br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>District</th>
                    <th>Population</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td scope="col"><?= $row['name']; ?></td>
                    <td scope="col"><?= $row['district']; ?></td>
                    <td scope="col"><?= $row['population']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
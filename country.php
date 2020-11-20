        <br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Continent</th>
                    <th>Independence</th>
                    <th>Head of State</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td scope="col"><?= $row['name']; ?></td>
                    <td scope="col"><?= $row['continent']; ?></td>
                    <td scope="col"><?= $row['independence_year']; ?></td>
                    <td scope="col"><?= $row['head_of_state']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
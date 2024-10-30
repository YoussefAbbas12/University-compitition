<?php
    include ("./components/header.php");
    include ("./components/nav.php");

?>


        <div id="layoutSidenav">
            <?php
                include ("./components/sideNav.php");
            ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Result</h1>
                            <div class="col-xl-10 mb-5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Team ID</th>
                                        <th>Event ID</th>
                                        <th>Part ID</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $highestScore = 0; // متغير لتخزين أعلى نتيجة
                                        $highestScoreID = 0; // متغير لتخزين أعلى نتيجة
                                        $teamsSql = "SELECT * FROM `scores`";
                                        $teams = mysqli_query($connection, $teamsSql);

                                        while ($row = mysqli_fetch_assoc($teams)):
                                            // تحديث أعلى نتيجة إذا كانت النتيجة الحالية أكبر
                                            if ($row['score'] > $highestScore) {
                                                $highestScore = $row['score'];
                                                $highestScoreID = $row['team_id'];
                                            }
                                    ?>
                                        <tr>
                                            <td><?= $row["team_id"] ?></td>
                                            <td><?= $row["event_id"] ?></td>
                                            <td><?= $row["part_id"] ?></td>
                                            <td><?= $row["score"] ?></td>
                                        </tr>
                                    <?php endwhile; ?>

                                </tbody>
                            </table>


<!-- عرض أعلى نتيجة أسفل الجدول -->
<div class="alert alert-info">
    <strong>Highest Score: Team (<?= $highestScoreID ?>) = </strong> <?= $highestScore ?>
</div>


                                </div>
                            </div>
                    </div>
                </main>
<?php
    $finishCompitition = false;

    if($finishCompitition){
        echo '<script>alert("Competion finished!");</script>';

    }
    
    include ("./components/footer.php");
?>
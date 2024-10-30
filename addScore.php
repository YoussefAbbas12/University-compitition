<?php
include("./components/header.php");
include("./components/nav.php");

?>


<div id="layoutSidenav">
    <?php
    include("./components/sideNav.php");
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add Score</h1>
                <div class="col-xl-10">
                <form class="border-1" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Team ID</label>
                        <input type="number" name="team_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Event ID</label>
                        <input type="number" name="event_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Participants ID</label>
                        <input type="number" name="part_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Score</label>
                        <input type="number" name="score" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <button type="submit" name="submitted" style="margin-left: 15px;" class="btn btn-outline-primary w-25 ml-5">Submit</button>
                    
                </form>
                    <?php
                        if (isset($_POST['submitted'])) {
                            $team_id = $_POST["team_id"];
                            $part_id = $_POST["part_id"];
                            $event_id = $_POST["event_id"];
                            $score = $_POST["score"];
                            $addTeamSql = "INSERT INTO `scores`(`team_id`, `part_id`, `event_id`, `score`) VALUES ('$team_id','$part_id','$event_id','$score')";                                        
                            $connection->query($addTeamSql);
                        }
                    ?>
                </div>

                <div class="col-xl-10 mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Team ID</th>
                                <th>Event ID</th>
                                <th>Part ID</th>
                                <th>Score</th>
                                <th>Delete</th>
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
                                    <td><a href="addScore.php?del=<?= $row['team_id'] ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>

                    <!-- عرض أعلى نتيجة أسفل الجدول -->
                    <div class="alert alert-info">
                        <strong>Highest Score: Team ID (<?= $highestScoreID ?>) = </strong> <?= $highestScore ?>
                    </div>

                </div>
            </div>
    </div>
    </main>
    <?php
    include("./components/footer.php");
    ?>
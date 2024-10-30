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
                        <h1 class="mt-4">Participants</h1>
                        <div class="row">
                            <div class="col-xl-10 m-5">
                                <?php
                                    $wantedTeam = $_GET['teamID'];
                                    $counter = 1;
                                    $teamsSql = "SELECT * FROM `team` where `team_id` = '$wantedTeam'";
                                    $teams = mysqli_query($connection, $teamsSql);
                                    while ($row = mysqli_fetch_assoc($teams)): 
                                        $teamID = $row['team_id'];
                                ?>
                                <div class="teamInfo">
                                    <table  class="table table-bordered">
                                        <tr>
                                            <th><h2>ID : <?= $row["team_id"] ?></h2></th>
                                            <th><h2>Name : <?= $row["team_name"] ?></h2></th>
                                            <th><img src="assets/img/<?= $row['team_name']?>.png" style="height: 40px;"></th>
                                        </tr>
                                    </table>
                                </div>                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Team ID</th>
                                            <th>Participants ID</th>
                                            <th>Name</th>
                                            <th>Eamil</th>
                                            <th>Date of birht</th>
                                            <th>Participant type</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $teamsSql = "SELECT * FROM `participants` WHERE `team_id` = $teamID";
                                            $teams = mysqli_query($connection, $teamsSql);
                                            while ($row = mysqli_fetch_assoc($teams)): 
                                        ?>
                                            <tr>
                                                <td><?= $row["team_id"] ?></td>
                                                <td><?= $row["part_id"] ?></td>
                                                <td><?= $row["name"] ?></td>
                                                <td><?= $row["email"] ?></td>
                                                <td><?= $row["date_of_birth"] ?></td>
                                                <td><?= $row["participants_type"] ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <?php $counter = $counter +1; endwhile; ?>

                            </div>
                        </div>
                        </div>
                    </div>
                </main>
<?php
    include ("./components/footer.php");
?>

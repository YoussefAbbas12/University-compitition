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
                        <h1 class="mt-4">Team</h1>
                        <div class="row">

                            <div class="col-xl-10">
                                <form class="border-1" action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Team name</label>
                                        <input type="text" name="team_name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Choose Logo</label>
                                        <input class="form-control" name="logo" type="file" id="formFile">                                    </div>
                                    </div>
                                    <button type="submit" name="submitted" style="margin-left: 15px;" class="btn btn-outline-primary w-25 ml-5">Submit</button>
                                    
                                </form>
                                    <?php
                                        $index = 1;
                                        if (isset($_POST['submitted'])) {
                                            $teamName = $_POST["team_name"];
                                            $file = $_FILES['logo'];
                                            $tmp_name = $file['tmp_name'];
                                            $destination = 'assets/img/'.$teamName.'.png';
                                            move_uploaded_file($tmp_name, $destination);                                        
                                            $addTeamSql = "INSERT INTO `team`(`team_name`) VALUES ('$teamName')";                                        
                                            $connection->query($addTeamSql);
                                        }
                                        $index++;
                                    ?>
                            </div>

                            <div class="col-xl-10 m-5">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Team ID</th>
                                            <th>Team Name</th>
                                            <th>Logo</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $counter = 1;
                                            $teamsSql = "SELECT * FROM `team`";
                                            $teams = mysqli_query($connection, $teamsSql);
                                            while ($row = mysqli_fetch_assoc($teams)): 
                                        ?>
                                            <tr>
                                                <td><?= $row["team_id"] ?></td>
                                                <td><?= $row["team_name"] ?></td>
                                                <td><img src="assets/img/<?= $row['team_name']?>.png" style="height: 40px;" alt=""></td>
                                                <th><a href="team.php?del=<?=$row['team_id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a></th>
                                            </tr>
                                        <?php $counter = $counter +1; endwhile; ?>
                                    </tbody>

                                    <?php
                                        if(isset($_GET['del'])){
                                            $delTeamId = $_GET['del'];
                                            $teamsSql = "DELETE FROM `team` WHERE `team_id` = $delTeamId";
                                            $teams = mysqli_query($connection, $teamsSql);                                            
                                        }
                                    ?>

                                </table>    
                            </div>
                        </div>
                        </div>
                    </div>
                </main>
<?php
    include ("./components/footer.php");
?>

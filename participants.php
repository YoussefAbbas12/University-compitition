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
                            <div class="col-xl-10">
                                <form class="border-1" action="" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Team ID</label>
                                        <input type="number" name="team_id" required class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" name="name" required class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" name="email" required class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Date of birth</label>
                                        <input type="date" name="date_of_birth" required class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div>
                                        <div  class="mb-3">
                                            <select class="select form-select" name="participants_type">
                                                <option value="individul">Team</option>
                                                <option value="team">Individul</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" name="mumberSubmitted" style="margin-left: 15px;" class="btn btn-outline-primary w-25 ml-5">Submit</button>
                                    
                                </form>
                                <?php
                                    if (isset($_POST['mumberSubmitted'])) {
                                        $team_id2 = $_POST["team_id"];
                                        $name = $_POST["name"];
                                        $email = $_POST["email"];
                                        $date_of_birth = $_POST["date_of_birth"];
                                        $participants_type = $_POST["participants_type"];

                                        $addTeamSql = "INSERT INTO `participants` (`name`, `email`, `date_of_birth`, `participants_type`, `team_id`) VALUES ('$name','$email','$date_of_birth','$participants_type',$team_id2);";
                                        $connection->query($addTeamSql);
                                        echo '    
                                        <script>
                                            alert("participants added successfully");
                                        </script>';
                                    }
                                ?>
                            </div>
                            <div class="col-xl-10 m-5">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Team ID</th>
                                            <th>Participants ID</th>
                                            <th>Name</th>
                                            <th>Eamil</th>
                                            <th>Date of birht</th>
                                            <th>Participant type</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $teamsSql = "SELECT * FROM `participants`";
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
                                                <th><a href="participants.php?del=<?=$row['part_id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a></th>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <?php
                                    if(isset($_GET['del'])){
                                        $delTeamId = $_GET['del'];
                                        $teamsSql = "DELETE FROM `participants` WHERE `part_id` = $delTeamId";
                                        $teams = mysqli_query($connection, $teamsSql);                                            
                                    }
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </main>
<?php
    include ("./components/footer.php");
?>

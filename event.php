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
                        <h1 class="mt-4">Event</h1>
                        <div class="row">
                            <div class="col-xl-10">
                                <form class="border-1" action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Event name</label>
                                        <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Event Type</label>
                                        <input type="text" name="event_type" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Event Description</label>
                                        <input type="text" name="description" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Event Date</label>
                                        <input type="text" name="date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Event Time</label>
                                        <input type="text" name="time" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Event location</label>
                                        <input type="text" name="location" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="submittedEvent" style="margin-left: 15px;" class="btn btn-outline-primary w-25 ml-5">Submit</button>                                    
                                </form>
                                    <?php
                                        if (isset($_POST['submittedEvent'])) {
                                            $eventName = $_POST["name"];
                                            $eventType = $_POST["event_type"];
                                            $eventDescription = $_POST["description"];
                                            $eventDate = $_POST["date"];
                                            $eventTime = $_POST["time"];
                                            $eventLocation = $_POST["location"];
                                            $addTeamSql = "INSERT INTO `events`(`name`, `event_type`, `description`, `date`, `time`, `location`,`image`) VALUES ('$eventName','$eventType','$eventDescription','$eventDate','$eventTime','$eventLocation')";                                        
                                            $connection->query($addTeamSql);
                                        }
                                    ?>
                            </div>
                            <div class="col-xl-10 m-5">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Event ID</th>
                                            <th>Event Name</th>
                                            <th>Event Type</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Location</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $teamsSql = "SELECT * FROM `events`";
                                            $teams = mysqli_query($connection, $teamsSql);
                                            while ($row = mysqli_fetch_assoc($teams)): 
                                        ?>
                                            <tr>
                                                <td><?= $row["event_id"] ?></td>
                                                <td><?= $row["name"] ?></td>
                                                <td><?= $row["event_type"] ?></td>
                                                <td><?= $row["description"] ?></td>
                                                <td><?= $row["date"] ?></td>
                                                <td><?= $row["time"] ?></td>
                                                <td><?= $row["location"] ?></td>
                                                <th><a href="event.php?del=<?=$row['event_id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a></th>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>

                                    <?php
                                        if(isset($_GET['del'])){
                                            $delTeamId = $_GET['del'];
                                            $teamsSql = "DELETE FROM `events` WHERE `event_id` = $delTeamId";
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

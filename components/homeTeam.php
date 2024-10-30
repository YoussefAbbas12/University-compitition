                        <div class="row">
                            <?php
                                $connection = mysqli_connect('localhost','root','','cmpitition');
                                $teamsSql = "SELECT * FROM `team`";
                                $teams = mysqli_query($connection, $teamsSql);
                                while ($row = mysqli_fetch_assoc($teams)): 
                            ?>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <!-- <div class="card-img">
                                        <img src="./teamLogo.jpg">
                                    </div> -->
                                    <div class="card-body"><?= $row["team_name"] ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./teamDetails.php?teamID=<?=$row['team_id']?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
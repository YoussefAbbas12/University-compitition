<div class="row">
    <h1 class="mt-4">Events</h1>
    <?php 
        $connection = mysqli_connect('localhost','root','','cmpitition');
        $teamsSql = "SELECT * FROM `events`";
        $teams = mysqli_query($connection, $teamsSql);
        $index = 1;
        while ($row = mysqli_fetch_assoc($teams)): 
    ?>
    <div class="card bg-dark" style="width: 18rem;margin: 10px;">
        <div class="card-body text-center p-0">
            <h5 class="card-title text-light"><?=$row['name']?></h5>
            <p class="card-text text-light"><?=$row['description']?></p>
            <a href="./result.php" class="btn btn-primary m-2">View Score</a>
        </div>
    </div>
    <?php $index++; endwhile; ?>
</div>
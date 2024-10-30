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
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <?php
                            include ("./components/homeTeam.php");
                            include ("./components/homeEvents.php");
                        ?>
                        </div>
                    </div>
                </main>
<?php
    include ("./components/footer.php");
?>

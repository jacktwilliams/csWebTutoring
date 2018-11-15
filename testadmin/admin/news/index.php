<?php
    $path = "../../";
    include $path . "admin_head1.html"; 
?>
    <link rel="stylesheet" href="<?php print $path; ?>../news/css/news.css">
<?php
    include $path . "admin_head2.html"; 
?>

    <!-- BANNER SECTION -->
    <div class="banner row">
        <div class="image large-12 large-centered columns">
            <img src="<?php print $path; ?>../img/News.png">
            <h2>News Admin Page</h2>
        </div>
    </div>
    <!-- DIVIDER -->
    <div class="row"><img src="<?php print $path; ?>../img/line.svg"></div>

    <main>
        <div class="row small-6 medium-5 large-4">
            <a id="office_button" href="x.php" class="button large expanded">ADD A NEWS ARTICLE</a>
        </div>
        <div class="row small-6 medium-5 large-4">
            <a id="office_button" href="y.php" class="button large expanded">EDIT A NEWS ARTICLE</a>
        </div>
        <div class="row small-6 medium-5 large-4">
            <a id="office_button" href="z.php" class="button large expanded">DELETE A NEWS ARTICLE</a>
        </div>
    </main>

<?php include $path . "admin_footer.html"; ?>
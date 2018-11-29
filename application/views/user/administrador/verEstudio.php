<h6>Mjesto Odredista: 
<?php if ($posts) {
    foreach ($posts as $post) : ?>

        <div class="well">
             <!--$post is an object, so u use the arrow to display it, instead of the [] for arrays
             note that this only works if mjestoOdredista is a column name from your database, if not, use the column name to display the value -->
             <h5><?= $post->mjestoOdredista ?></h5>
        </div>

    <?php endforeach;

} else { ?>
    <h1>prueba</h1>
  

<?php 
} ?>
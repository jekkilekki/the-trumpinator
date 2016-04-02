<?php
/*
 * Other things to randomize
 * Text output
 * Adjective within the text
 * Redirect (or add link) to a URL randomly chosen from a list of URLs
 * Random quotes/movie quotes/inspirational quotes
 * Random image/set of images
 * Randomly order images in a slideshow
 * Generate random phrases (Mad Libs)
 * array_rand( $array ); // returns a random key from an array
 * -> same as rand( 0, count( $array )-1 );
 */

include_once( 'functions.php' );
include_once( 'lists.php' );

/**
 * Set up variables for use on the site
 */
$colors = get_colors( $america_palettes );

$font_family = pick_random( $fonts );
$font_size = rand( 25, 100 );
$style = pick_random( $styles );

// $index = array_rand( $fragments );
// $sentence = 'Donald Trump ' . $fragments[ $index ] . '.';

// $trump_sentence = pick_random( $subjects ) . " " . pick_random( $verbs ) . " " . pick_random( $objects ) . ".";

// Complex sentences $subject . $verb . $qty . $adj . $object
$subj = pick_random( $subjects );
//$verb = pick_random( $verbs );
//$qty = pick_random( $quantities );
$adj = pick_random( $adjectives );
//$obj = pick_random( $objects );
$make_obj = pick_random( $make_objs );

// Pluralization
//if( $qty != 'a' && $qty != 'every' && $qty != 'his' && $qty != 'your' ) {
//    $obj .= 's';
//}

//$complex_trump = $subj . " " . $verb . " " . $qty . " " . $adj . " " . $obj . ".";
$trump_makes = $subj . ' makes ' . $make_obj . ' ' . "<span>$adj</span>" . ' again.';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=<?= $font_family; ?>">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>The Random Page</title>
    <style type="text/css">
        body {
            background: <?= $colors[0]; ?>;
            font-family: '<?= str_replace( '+', ' ', $font_family ); ?>';
        }
        main {
            border: 50px solid <?= $colors[2]; ?>;
        }
        .object {
            background: <?= $colors[1]; ?>;
        }
        h1 {
            background: <?= $colors[4]; ?>;
            color: <?= $colors[3]; ?>;
        }
        p {
            color: <?= $colors[3]; ?>;
            font-size: <?= $font_size ?>px;
        }
        a {
            color: <?= $colors[3]; ?>;
        }
        p span {
            color: <?= $colors[4]; ?>;
            <?php 
            switch( $style ) {
                case 'bold':
                    echo "font-weight: bold;";
                    break;
                case 'italic':
                    echo "font-style: italic;";
                    break;
                case 'underline':
                    echo "text-decoration: underline;";
                    break;
                case 'uppercase':
                    echo "text-transform: uppercase;";
                    break;
            }
            ?>
        }
    </style>
</head>
<body>
    <?= create_bg( $bg_funcs, $colors[1] ); ?>
    <main id="content">
        <h1>
            <i class="fa fa-bars"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <span>The Trumpinator!</span>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-bars"></i>
        </h1>
        <figure id="profile">
            <img src="img/trump_<?= pick_random( $images ); ?>.jpg">
            <figcaption>Picture source:</figcaption>
        </figure>
        <p><a href=""><?= ucfirst( $trump_makes ); ?></a></p>
    </main>
</body>
<script type="text/javascript" src="functions.js"></script>
</html>
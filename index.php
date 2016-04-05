<?php
/*
 * The Trumpinator!
 */

session_start();

if( isset( $_GET[ 'dictionary' ] ) && $_GET[ 'dictionary' ] == 'Donald%27s+Dictionary' ) {
    $_SESSION[ 'dictionary' ] = 'donald';
} elseif( $_GET[ 'dictionary' ] == 'the+Default' ) {
    $_SESSION[ 'dictionary' ] = '';
}

include_once( 'inc/functions.php' );
include_once( 'inc/lists.php' );

/**
 * Set up variables for use on the site
 */
$colors = get_colors( $america_palettes );

$font_family = pick_random( $fonts );
$font_size = rand( 50, 72 );
$style = pick_random( $styles );

// Default sentence constructors
$subj = pick_random( $subjects );
$adj = pick_random( $adjectives );
$make_obj = pick_random( $make_objs );

// Donald's Dictionary sentence constructors (http://nymag.com/daily/intelligencer/2015/08/donalds-dictionary.html)
$trump_obj = pick_random( $trump_objs );
$trump_adj = pick_random( $trump_adjs );

if ( $_SESSION[ 'dictionary' ] == 'donald' ) {
    $trump_makes = $subj . ' makes ' . $trump_obj . ' ' . "<span>$trump_adj</span>" . ' again!';
} else {
    $trump_makes = $subj . ' makes ' . $make_obj . ' ' . "<span>$adj</span>" . ' again!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=<?= $font_family; ?>">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Trumpinator!!!</title>
    <style type="text/css">
        body {
            background: <?= $colors[0]; ?>;
            font-family: '<?= str_replace( '+', ' ', $font_family ); ?>';
        }
        main {
            border: 50px solid <?= $colors[2]; ?>;
        }
        hr, #about_box {
            border-color: <?= $colors[2]; ?>;
        }
        .object {
            background: <?= $colors[1]; ?>;
        }
        h1 {
            background: <?= $colors[4]; ?>;
        }
        main p {
            font-size: <?= $font_size ?>px;
        }
        h1, h2, h3, h4, h5, h6, p, footer, #dons_dic, #dons_dic input, ul {
            color: <?= $colors[3]; ?>;
            font-family: '<?= str_replace( '+', ' ', $font_family ); ?>';
        }
        #dons_dic input {
            border-color: <?= $colors[3]; ?>;
        }
        a {
            color: <?= $colors[3]; ?>;
        }
        main p span {
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
        #page, #about_box {
            background: <?= $colors[4]; ?>;
        }
        #disclaimer, #dons_dic {
            background: <?= $colors[1]; ?>;
        }
        #pro {
            border-right: 3px dashed;
            border-color: <?= $colors[0]; ?>;
        }
        #anti {
            border-left: 3px dashed;
            border-color: <?= $colors[0]; ?>;
        }
    </style>
</head>
<body>
    
    <?php include 'about.php'; ?>
    
    <div id="dons_dic">
        <form action="?" method="GET">
            Use
            <input id="ddic" type="submit" name="dictionary" value="<?php
                if( $_SESSION[ 'dictionary' ] == 'donald' ) {
                    echo "the Default";
                } else {
                    echo "Donald's Dictionary";
                } ?>">
        </form>
    </div>
    
    <?= create_bg( $bg_funcs, $colors[1] ); ?>
    <main id="content">
        <h1 id="title" class="about_link">
            <i class="fa fa-bars hide-for-small hide-for-medium"></i>
            <i class="fa fa-star hide-for-small hide-for-medium"></i>
            <i class="fa fa-star hide-for-small"></i>
            <i class="fa fa-star"></i>
            <span>The Trumpinator!</span>
            <i class="fa fa-star"></i>
            <i class="fa fa-star hide-for-small"></i>
            <i class="fa fa-star hide-for-small hide-for-medium"></i>
            <i class="fa fa-bars hide-for-small hide-for-medium"></i>
        </h1>
        <div id="inator">
            
            <?= create_random_image( $images_cc ); ?>
            
            <p id="sentence"><a href=""><?= ucfirst( $trump_makes ); ?> <i class="fa fa-refresh"></i>
                <?php 
                echo "<pre>Session "; var_dump( $_SESSION ); 
                echo 'Get '; var_dump( $_GET );
                echo 'Post '; var_dump( $_POST );
                echo "</pre>"; ?>
                </a></p>
        </div>
    </main>
    <aside id="page">
        <div id="disclaimer">
            <p>
                Love him or hate him, there's no denying that Donald Trump is 
                the YUGEST name in American politics right now. And his 
                campaign slogan "Make America Great Again" is equally amazing. 
                So, in the spirit of fun, I've built this site to throw together 
                a random collection of adjectives and objects to create entirely 
                NEW phrases to show exactly WHAT impact Trump is having on America. 
                Enjoy!
            </p>
        </div>
        <div id="stuff">
            <div id="pro">
                <h2>Pro Trump?</h2>
                <ul>
                    <li><a  href="http://www.amazon.com/gp/product/1501137964/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=1501137964&linkCode=as2&tag=jekkilekki-20&linkId=4ET4AMQ4IMDLZDTD"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=1501137964&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=jekkilekki-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=jekkilekki-20&l=as2&o=1&a=1501137964" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                    </li>
                    <li><a  href="http://www.amazon.com/gp/product/1621574954/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=1621574954&linkCode=as2&tag=jekkilekki-20&linkId=ACYFKFE26BW6AHLO"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=1621574954&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=jekkilekki-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=jekkilekki-20&l=as2&o=1&a=1621574954" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                    </li>
                    <li><a  href="http://www.amazon.com/gp/product/0399594493/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=0399594493&linkCode=as2&tag=jekkilekki-20&linkId=WTF7EDHMG6KGXAT6"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=0399594493&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=jekkilekki-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=jekkilekki-20&l=as2&o=1&a=0399594493" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                    </li>
                </ul>
            </div>
            <div id="anti">
                <h2>Anti Trump?</h2>
                <ul>
                    <li><a href="http://www.amazon.com/gp/product/1784784184/ref=as_li_ss_il?ie=UTF8&linkCode=li3&tag=jekkilekki-20&linkId=dee6d45eefeab784e07ba77bf1cf3bdc" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=1784784184&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=jekkilekki-20" ></a><img src="//ir-na.amazon-adsystem.com/e/ir?t=jekkilekki-20&l=li3&o=1&a=1784784184" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                    </li>
                    <li><a href="http://www.amazon.com/gp/product/1603586679/ref=as_li_ss_il?ie=UTF8&linkCode=li3&tag=jekkilekki-20&linkId=4d935faa698ca8ad0e0c4c0bad8b8a76" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=1603586679&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=jekkilekki-20" ></a><img src="//ir-na.amazon-adsystem.com/e/ir?t=jekkilekki-20&l=li3&o=1&a=1603586679" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                    </li>
                    <li><a href="http://www.amazon.com/gp/product/1568586841/ref=as_li_ss_il?ie=UTF8&linkCode=li3&tag=jekkilekki-20&linkId=78379281698bb6623708f99784f37939" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=1568586841&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=jekkilekki-20" ></a><img src="//ir-na.amazon-adsystem.com/e/ir?t=jekkilekki-20&l=li3&o=1&a=1568586841" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <footer>
        Full disclosure: The above are Amazon affiliate links. If you use my link to shop on Amazon, I'll get a small commission.
        <hr>
        <span><!-- &copy; 2016 Aaron Snowberger | -->
            <a class="about_link" href="#">About this Site</a> | 
            <a href="http://nymag.com/daily/intelligencer/2015/08/donalds-dictionary.html">Words in Donald's Dictionary</a>
        </span>
    </footer>
    
    <script type="text/javascript" src="js/functions.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Trumpinator -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-6617065747701516"
         data-ad-slot="3374394585"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    
</body>
</html>

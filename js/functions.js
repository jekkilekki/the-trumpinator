/**
 * JavaScript controls that
 * 1. Make page size full width and height on load and page resize
 * 2. Float picture and image side by side on landscape screens
 * 3. Control the pop-up "About" page
 */

// Make the page the full width, height of the window
windowControl();

// Adjust page size on window resize
window.addEventListener( 'resize', windowControl );

/*
 * Window Control function
 */
function windowControl() {
    var width = window.innerWidth ||
            document.documentElement.clientWidth ||
            document.body.clientWidth ||
            document.body.offsetWidth;
    var height = window.innerHeight ||
            document.documentElement.clientHeight ||
            document.body.clientHeight ||
            document.body.offsetHeight;
    
    document.getElementById( "content" ).style.width = width + "px";
    document.getElementById( "content" ).style.height = height + "px";
    
    // Readjust image and sentence to float side-by-side on landscape screens
    if ( width > height ) {
        document.getElementById( 'profile' ).style.width = "30%";
        document.getElementById( 'sentence' ).style.width = "40%";
        document.getElementById( 'profile' ).style.float = "left";
        document.getElementById( 'sentence' ).style.float = "left";
        document.getElementById( 'profile' ).style.marginLeft = "12%";
        document.getElementById( 'profile' ).style.marginTop = "5%";
        document.getElementById( 'sentence' ).style.marginLeft = "6%";
    } else {
        document.getElementById( 'profile' ).style.width = "50%";
        document.getElementById( 'sentence' ).style.width = "75%";
        document.getElementById( 'profile' ).style.float = "none";
        document.getElementById( 'sentence' ).style.float = "none";
        document.getElementById( 'profile' ).style.marginLeft = "auto";
        document.getElementById( 'sentence' ).style.marginLeft = "auto";
    }
}

// Grab all links that link to the About page
var about = document.getElementsByClassName( "about_link" );

// For all of those links, add a click listener to display the page when clicked
for( var i=0; i<about.length; i++ ) {
    about[i].onclick = function() {
        document.getElementById( "about_page" ).style.display = "block"; 
    };
}
// If you click anywhere after the page is displayed, turn off the page
document.getElementById( "about_page" ).onclick = function() {
    document.getElementById( "about_page" ).style.display = "none";
};


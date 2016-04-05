//var width = window.innerWidth ||
//            document.documentElement.clientWidth ||
//            document.body.clientWidth ||
//            document.body.offsetWidth;
//var height = window.innerHeight ||
//            document.documentElement.clientHeight ||
//            document.body.clientHeight ||
//            document.body.offsetHeight;
//
//
//
//document.getElementById( "content" ).style.width = width + "px";
//document.getElementById( "content" ).style.height = height + "px";

window.addEventListener( 'load', windowControl );
window.addEventListener( 'resize', windowControl );

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
    
    if ( width > height ) {
        document.getElementById( 'profile' ).style.width = "30%";
        document.getElementById( 'sentence' ).style.width = "40%";
        document.getElementById( 'profile' ).style.float = "left";
        document.getElementById( 'sentence' ).style.float = "left";
        document.getElementById( 'profile' ).style.marginLeft = "12%";
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

var about = document.getElementsByClassName( "about_link" );

for( var i=0; i<about.length; i++ ) {
    about[i].onclick = function() {
        document.getElementById( "about_page" ).style.display = "block"; 
    };
}
document.getElementById( "about_page" ).onclick = function() {
    document.getElementById( "about_page" ).style.display = "none";
};

//document.getElementById( "ddic" ).onclick = function() {
//    if ( document.getElementById( "ddic" ).name == "default" ) {
//        document.getElementById( "ddic" ).value = "Donald's Dictionary";
//        document.getElementById( "ddic" ).name = "donalds_dictionary";
//    } else {
//        document.getElementById( "ddic" ).value = "the Default";
//        document.getElementById( "ddic" ).name = "default";
//    }
//}

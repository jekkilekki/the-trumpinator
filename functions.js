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

var about = document.getElementsByClassName( "about_link" );

for( var i=0; i<about.length; i++ ) {
    about[i].onclick = function() {
        document.getElementById( "about_page" ).style.display = "block"; 
    };
}
document.getElementById( "about_page" ).onclick = function() {
    document.getElementById( "about_page" ).style.display = "none";
};

document.getElementById( "ddic" ).onclick = function() {
    if ( document.getElementById( "ddic" ).name == "default" ) {
        document.getElementById( "ddic" ).value = "Donald's Dictionary";
        document.getElementById( "ddic" ).name = "donalds_dictionary";
    } else {
        document.getElementById( "ddic" ).value = "the Default";
        document.getElementById( "ddic" ).name = "default";
    }
}

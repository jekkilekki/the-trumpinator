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
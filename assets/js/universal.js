function getParams(a){var b=document.getElementsByTagName("script");for(var i=0;i<b.length;i++){if(b[i].src.indexOf("/"+a)>-1){var c=b[i].src.split("?").pop().split("&");var p={};for(var j=0;j<c.length;j++){var d=c[j].split("=");p[d[0]]=d[1]}return p}}return{}}

function getQueryParams(qs) {
    qs = qs.split('+').join(' ');

    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }

    return params;
}

$(function(){
var query = getQueryParams(document.location.search);
$(".c_"+query.c).addClass("active");

})



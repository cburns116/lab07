function goingthrough(doc, depth = 0){
    if(doc.nodeType != 1)
        return ""

    var txt = "-".repeat(depth)+doc.tagName+"\n"
    //print string
    for(var i = 0; i<doc.childNodes.length; i++){




       txt += goingthrough(doc.childNodes[i],depth+1) 
    }

    return txt




}
function changecss(item){
    var itm = item.nextSibling
    var cln = itm.cloneNode(true)
    document.getElementById("append").appendChild(cln)
}

document.addEventListener('DOMContentLoaded', function() {
    var doc = document.documentElement
    console.log(goingthrough(doc))
    document.getElementById("info").innerHTML = goingthrough(doc)
    var itm = document.getElementById("fav")
    changecss(itm)

});
document.addEventListener("mouseover",function(){
    var doc = this
    goingthrough2(doc, depth=0)
});
function goingthrough2(doc, depth = 0){
    if(doc.nodeType != 1)
        return ""

    alert(txt)
    doc.style.backgroundColor = "blue";
    doc.style.textAlign = "center";
    //print string
    for(var i = 0; i<doc.childNodes.length; i++){




       goingthrough(doc.childNodes[i],depth+1) 
    }
    
    return 0




}



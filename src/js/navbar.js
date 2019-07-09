
function showLinks(event){
    let links = document.getElementsByClassName("link-list");
    for (let i = 0 ; i<links.length;i++){
        console.log(links[i].classList.contains("show-links"));
        if(!links[i].classList.contains("show-links")){
            console.log("show")
            links[i].style.display = "block";
            links[i].classList.add("show-links");
            event.target.innerText = "Links ▲";
        }else{
            event.target.innerText = "Links ▼";
            links[i].classList.remove("show-links");
            links[i].style.display = "none";
        }
        
    }
    console.log("sss")
}
var listBtn = document.getElementById("list-btn");
listBtn.onclick = showLinks;
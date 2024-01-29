
let outer = document.getElementsByClassName('mainBox');
let inner = document.getElementsByClassName('innerBox');
let acnt = document.getElementsByClassName('accnt');
let specOps = document.getElementsByClassName('specOps');


function openAccnt(){
    acnt[0].style.display = "block";
}

function openMode1(){
    outer[0].style.display = "block";
    inner[0].style.display = "block";
    inner[1].style.display = "none";
    inner[2].style.display = "none";
    acnt[0].style.display = "block";
}

function openMode2(){
    outer[0].style.display = "block";
    inner[0].style.display = "none";
    inner[1].style.display = "block";
    inner[2].style.display = "none";
    acnt[0].style.display = "none";
}

function openMode3(){
    outer[0].style.display = "block";
    inner[0].style.display = "none";
    inner[1].style.display = "none";
    inner[2].style.display = "block";
    acnt[0].style.display = "none";
}

window.onclick = function(event) {
    if (event.target == outer[0]) {
        outer[0].style.display = "none";
            
        for(let i=0; i<inner.length;i++){
            inner[i].style.display = "none";
        }
        acnt[0].style.display = "none";
    }
}

function closeMe(){
    outer[0].style.display = "none";    

    for(let i=0; i<inner.length;i++){
        inner[i].style.display = "none";
    }
    acnt[0].style.display = "none";
}

function showOps(){
    console.log(specOps[0]);
    for(let i=0; i<specOps.length; i++){
        specOps[i].style.display = "block";
    }
}
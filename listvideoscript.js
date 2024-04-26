let videoList = document.querySelectorAll('.video-list-container .list');

videoList.forEach(vid =>{
   vid.onclick = () =>{
      videoList.forEach(remove =>{remove.classList.remove('active')});
      vid.classList.add('active');
      let src = vid.querySelector('.list-video').src;
      let title = vid.querySelector('.list-title').innerHTML;
      document.querySelector('.main-video-container .main-video').src = src;
      document.querySelector('.main-video-container .main-video').play();
      document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
      //document.getElementById('element').style.display = "block";
      
   };
});

const list = document.querySelector('.list');
const tick = document.getElementById("element");

list.addEventListener("click", action());

function action(){
   tick.style.display = "block";
}


/*var dropdown = document.getElementsByClassName("list");
var i;
for (i = 0; i < dropdown.length; i++) {
   dropdown[i].addEventListener("click", function() {
   document.getElementById('element').style.display = "none";
});
}*/
// Initialiser Swiper avec l'effet Coverflow
// const swiperContainer = document.querySelector(".swiper-container");
// console.log(swiperContainer);
// const myData = JSON.parse(swiperContainer.dataset.myData);

var swiper = new Swiper(".swiper-container", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 2,
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination",
  },
  on: {
    slideChange: slideChange,
  },
});

slideChange.call(swiper);

// Définition de la fonction slideChange

function slideChange() {
  // Récupérer l'ID de la catégorie de la nouvelle slide
  var category_id = this.slides[this.activeIndex].getAttribute("data-id"); // Envoyer l'ID de la catégorie au contrôleur Symfony via AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/get-songs-by-category");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.responseType = "json";
  xhr.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = this.response;
      // Mettre à jour la liste de chansons avec les nouvelles chansons
      var songList = document.querySelector("#song-list");
      songList.innerHTML = "";
      response.forEach(function (song) {
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.setAttribute("href", "/player/" + song.id);
        // Ajouter l'URL en tant que data-url
        a.innerHTML = "<h4>" + song.artist + "</h4><h5>" + song.title + "</h5>";
        li.appendChild(a);
        songList.appendChild(li);
      });
    }
  };
  xhr.send("category_id=" + category_id);
}

let url = window.location.href;
let currentSongIndex = 0;
let songs = [];
let currentSong = null;
// Extraire le deuxième chiffre de l'URL pour l'ID de la catégorie
let categoryId = url.split("/")[5];

// Extraire le dernier chiffre de l'URL pour l'ID de la chanson
let songId = url.split("/")[4];

// Récupération de toutes les chansons de la même catégorie
function getSongsByCategory(categoryId, songId) {
  $.ajax({
    url: "/get-songs-by-category",
    type: "POST",
    data: {
      category_id: categoryId,
    },
    success: function (response) {
      // Stocker les chansons dans la variable songs
      songs = response;
      console.log(songs);

      // Trouver l'index de la chanson à jouer
      currentSongIndex = songs.findIndex((song) => song.id == songId);

      // Charger la chanson à jouer dans le lecteur audio
      loadSong(currentSongIndex);
    },
    error: function (error) {
      console.log(error);
    },
  });
}

function loadSong(index) {
  currentSong = songs[index];

  if (currentSong) {
    // Charger la chanson dans le lecteur audio
    $("#my-player").attr("src", currentSong.path_song);

    // Mettre à jour le titre de la chanson
    $("#song-title").text(currentSong.title);
    $("#song-artist").text(currentSong.artist);
  }
}

// Appeler la fonction getSongsByCategory avec les ID de la catégorie et de la chanson récupérés depuis l'URL
getSongsByCategory(categoryId, songId);

// Fonction pour charger la chanson précédente
function previousSong() {
  currentSongIndex--;
  if (currentSongIndex < 0) {
    currentSongIndex = songs.length - 1;
  }
  loadSong(currentSongIndex);

  // Mettre à jour l'URL de la page avec l'ID de la chanson précédente
  let previousSongId = songs[currentSongIndex].id;
  let url = window.location.href;
  let newUrl = url.replace(songId, previousSongId);
  window.history.pushState(null, null, newUrl);

  // Mettre à jour le titre de la chanson précédente
  let previousSongIndex = currentSongIndex - 1;
  if (previousSongIndex < 0) {
    previousSongIndex = songs.length - 1;
  }
  $("#previous-song-title").text(songs[previousSongIndex].title);
}

function nextSong() {
  currentSongIndex++;
  if (currentSongIndex >= songs.length) {
    currentSongIndex = 0;
  }
  loadSong(currentSongIndex);

  // Mettre à jour l'URL de la page avec l'ID de la chanson suivante
  let nextSongId = songs[currentSongIndex].id;
  let url = window.location.href;
  let newUrl = url.replace(songId, nextSongId);
  window.history.pushState(null, null, newUrl);
}

$(document).ready(function () {
  const player = new MediaElementPlayer("#my-player", {
    features: [
      "playpause",
      "progress",
      "current",
      "duration",
      "volume",
      "fullscreen",
    ],
    loop: false,
  });
  const disc = document.querySelector(".disc");

  player.addEventListener("pause", function () {
    console.log("coucou");
    disc.classList.remove("rotate");
  });

  player.addEventListener("play", function () {
    disc.classList.add("rotate");
  });

  // Charger la première chanson dans le lecteur audio
  loadSong(currentSongIndex);

  // Ajouter la fonctionnalité des boutons de lecture suivante et précédente
  $("#previous-song-btn").on("click", function () {
    previousSong();
  });

  $("#next-song-btn").on("click", function () {
    nextSong();
  });
});

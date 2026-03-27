const images = [
  "images/photo_gallery/img1.jpg",
  "images/photo_gallery/img2.jpg",
  "images/photo_gallery/img3.jpg",
  "images/photo_gallery/img4.jpg",
  "images/photo_gallery/img5.jpg",
  "images/photo_gallery/img6.jpg",
  "images/photo_gallery/img7.jpg",
  "images/photo_gallery/img8.jpg",
  "images/photo_gallery/img9.jpg"
];

function buildCarousel() {
  const container = document.getElementById("carousel-inner");
  container.innerHTML = "";

  const isMobile = window.innerWidth < 768;
  const chunkSize = isMobile ? 1 : 3;

  for (let i = 0; i < images.length; i += chunkSize) {
    const slide = document.createElement("div");
    slide.className = "carousel-item" + (i === 0 ? " active" : "");

    const row = document.createElement("div");
    row.className = "row";

    images.slice(i, i + chunkSize).forEach(src => {
      const col = document.createElement("div");
      col.className = isMobile ? "col-12" : "col-md-4";

      col.innerHTML = `<img src="${src}" class="carousel-img">`;
      row.appendChild(col);
    });

    slide.appendChild(row);
    container.appendChild(slide);
  }
}

// Initial build
buildCarousel();

// Rebuild on resize (debounced)
let resizeTimeout;
window.addEventListener("resize", () => {
  clearTimeout(resizeTimeout);
  resizeTimeout = setTimeout(buildCarousel, 200);
});
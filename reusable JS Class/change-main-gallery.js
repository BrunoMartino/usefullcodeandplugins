export default class ChangeGallery {
  constructor(galleryList, swatches, mainImg) {
    this.galleryList = document.querySelectorAll(galleryList);
    this.swatches = document.querySelectorAll(swatches);
    this.mainImg = document.querySelector(mainImg);

    this.changeImage = this.changeImage.bind(this);
  }

  changeImage({ currentTarget }) {
    this.mainImg.src = currentTarget.src;
  }
  addListChangeEvent() {
    this.galleryList.forEach((img) => {
      img.addEventListener("click", this.changeImage);
    });
    this.galleryList.forEach((img) => {
      img.addEventListener("click", () => {
        this.galleryList.forEach((obj) => {
          obj.classList.remove("active");
        });
        img.classList.add("active");
      });
    });
  }
  addSwatchesChangeEvent() {
    this.swatches.forEach((img) => {
      img.addEventListener("click", this.changeImage);
    });
    this.swatches.forEach((img) => {
      img.addEventListener("click", () => {
        this.swatches.forEach((obj) => {
          obj.parentElement.classList.remove("active");
        });
        img.parentElement.classList.add("active");
      });
    });
  }

  init() {
    this.addListChangeEvent();
    this.addSwatchesChangeEvent();
  }
}

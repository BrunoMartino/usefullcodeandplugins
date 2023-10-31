export default class IncrementQty {
  constructor(inputNumber) {
    this.inputNumber = document.querySelector(inputNumber);
  }

  createSpanBtn() {
    this.decreaseBtn = document.createElement("div");
    this.decreaseBtn.classList.add("decrease-btn");
    this.increaseBtn = document.createElement("div");
    this.increaseBtn.classList.add("increase-btn");
    // styles, icons e images are setted on CSS.

    this.inputNumber.insertAdjacentElement("beforebegin", this.decreaseBtn);
    this.inputNumber.insertAdjacentElement("afterend", this.increaseBtn);
  }

  controlValues() {
    this.qtyValue = +this.inputNumber.value;

    this.decreaseBtn.addEventListener("click", () => {
      if (!this.isChangeEventInProgress) {
        this.qtyValue--;
        if (this.qtyValue <= 0) {
          return 1;
        }
        this.inputNumber.value = this.qtyValue.toString();
      }
    });
    this.increaseBtn.addEventListener("click", () => {
      if (!this.isChangeEventInProgress) {
        this.qtyValue++;
        this.inputNumber.value = this.qtyValue.toString();
      }
    });
  }

  init() {
    this.createSpanBtn();
    this.controlValues();
  }
}

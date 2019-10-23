function Basket_Data(basketNumber, basketRoomName, basketOffer, basketPrice, id) {
    this.basketNumber = basketNumber;
    this.basketRoomName = basketRoomName;
    this.basketOffer = basketOffer;
    this.basketPrice = basketPrice;
    this.price = basketNumber * basketPrice;
    this.id = id;
}
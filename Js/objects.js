//Oggetto carrello
function Basket_Data(basketNumber, basketRoomName, basketOffer, basketPrice, id) {
    this.basketNumber = basketNumber;
    this.basketRoomName = basketRoomName;
    this.basketOffer = basketOffer;
    this.basketPrice = basketPrice;
    this.price = basketNumber * basketPrice;
    this.id = id;
}

//Oggetto camere
// function Room(roomID, roomType, freeRooms, price, tags, description_short, description_long, offers) {
//     this.roomID = roomID;
//     this.roomType = roomType;
//     this.freeRooms = freeRooms;
//     this.price = price;
//     this.tags = tags;
//     this.description_short = description_short;
//     this.description_long = description_long;
//     this.offers = offers;
// }

//Oggetto offerte da inserire nelle camere
// function Offer(offer_id, offer_name, offer_price, promotion, maximum_guest) {
//     this.offer_id = offer_id;
//     this.offer_name = offer_name;
//     this.offer_price = offer_price;
//     this.promotion = promotion;
//     this.maximum_guest = maximum_guest;
// }

function apiLaunch() {
    $.ajax({
        url: 'https://script.google.com/macros/s/AKfycbwyRMe5itYGQllEs1YTNImH7lAbLra1KzadHE-i8HEOVuO56hE/exec',
        type: 'POST',
        dataType: "json",
        success: function (data) {
            const arr = data[0].rooms;
            const rooms_container = $("#rooms_container");
            for (var i in arr) {
                let mainDiv = document.createElement("div");
                mainDiv.id = arr[i].room_id;
                mainDiv.classList.add("card", "col-12", "room-padding", "room-card", "img-resize");
                let divCardBody = document.createElement("div");
                divCardBody.classList.add("card-body");

                //Aggiunta Nome camera e badge prezzo
                let divBox = document.createElement("div");
                divBox.classList.add("box");
                let h4RoomTitle = document.createElement("h4");
                h4RoomTitle.classList.add("card-title", "room-title");
                $(h4RoomTitle).text(arr[i].room_type);
                let h2RoomPrice = document.createElement("h2");
                h2RoomPrice.classList.add("card-title");
                let spanRoomPrice = document.createElement("span");
                spanRoomPrice.classList.add("badge", "badge-primary", "badge-prezzo");
                $(spanRoomPrice).text(arr[i].price.price + "€");
                $(h2RoomPrice).append(spanRoomPrice);
                $(divBox).append(h4RoomTitle, h2RoomPrice);
                $(divCardBody).append(divBox);

                //Aggiunta tags
                let h6Tags = document.createElement("h6");
                h6Tags.classList.add("card-subtitle", "mb-2", "text-muted");
                let tags = arr[i].tags;
                let tagsText = "";
                for (e in tags) {
                    if (e < tags.length - 1) {
                        tagsText += tags[e] + " - ";
                    } else {
                        tagsText += tags[e] + "";
                    }
                }
                $(h6Tags).text(tagsText);
                $(divCardBody).append(h6Tags);

                //Aggiunta Carrosello
                let divBoxRow = document.createElement("div");
                divBoxRow.classList.add("box", "row");
                let divCarousel = document.createElement("div");
                divCarousel.id = "carouselA" + i;
                divCarousel.classList.add("carousel", "slide", "col-12", "col-sm-6");
                $(divCarousel).attr("data-ride", "carousel");
                let divCarouselInner = document.createElement("div");
                divCarouselInner.classList.add("carousel-inner", "modal-toggle");
                $(divCarouselInner).attr("data-toggle", "modal");
                $(divCarouselInner).attr("data-target", "#myModal");
                $(divCarouselInner).append("<a class='carousel-control-prev carousel-zoom'><span aria-hidden='true'>" +
                    "<i class='fas fa-search-plus'></i></span></a>");
                //Aggiunta foto
                let photos = arr[i].photos;
                for (e in photos) {
                    let divImg = document.createElement("div");
                    if (e == 0) {
                        divImg.classList.add("carousel-item", "active");
                    } else {
                        divImg.classList.add("carousel-item");
                    }
                    let imgTag = document.createElement("img");
                    imgTag.classList.add("d-block", "w-100", "h-100");
                    imgTag.src = photos[e];
                    $(divImg).append(imgTag);
                    $(divCarouselInner).append(divImg);
                }
                $(divCarousel).append(divCarouselInner);
                //Aggiunta pulsante immagine precedente
                let aPrev = document.createElement("a");
                aPrev.classList.add("carousel-control-prev");
                aPrev.href = "#carouselA" + i;
                $(aPrev).attr("role", "button");
                $(aPrev).attr("data-slide", "prev");
                $(aPrev).append("<span class='carousel-control-prev-icon' aria-hidden='true'></span>" +
                    "<span class='sr-only'>Previous</span>");
                $(divCarousel).append(aPrev);
                //Aggiunta pulsante immagine successiva
                let aNext = document.createElement("a");
                aNext.classList.add("carousel-control-next");
                aNext.href = "#carouselA" + i;
                $(aNext).attr("role", "button");
                $(aNext).attr("data-slide", "next");
                $(aNext).append("<span class='carousel-control-next-icon' aria-hidden='true'></span>" +
                    "<span class='sr-only'>Next</span>");
                $(divCarousel).append(aNext);
                $(divBoxRow).append(divCarousel);

                //Aggiunta descrizione
                let divDescr = document.createElement("div");
                divDescr.classList.add("col-12", "col-sm-6");
                let pDescr = document.createElement("p");
                pDescr.classList.add("card-text", "text-prova");
                if (window.matchMedia("(min-width: 768px)").matches) {
                    $(pDescr).text(arr[i].description_complete);
                } else {
                    $(pDescr).text(arr[i].description_short);
                    let hiddenDescr = document.createElement("p");
                    hiddenDescr.classList.add("hiddenDescr");
                    hiddenDescr.textContent = arr[i].description_complete;
                    $(hiddenDescr).css("display", "none");
                    $(divDescr).append(hiddenDescr);
                }
                $(divDescr).append(pDescr);
                $(divBoxRow).append(divDescr);

                //Aggiunta pulsante "Visualizza Offerte"
                $(divBoxRow).append("<div class='click-room col-12 col-sm-12'>" +
                    "<span class='btn-roomInfo badge badge-primary badge-prezzo'><div>" +
                    "<h6 class='btn-roomInfo-Text'>Visualizza offerte</h6>" +
                    "<i class='fas fa-chevron-down btn-arrow'></i></div></span></div>");
                $(divCardBody).append(divBoxRow);
                $(mainDiv).append(divCardBody);
                $(rooms_container).append(mainDiv);

                //Aggiunta Offer Card
                let divCardSelection = document.createElement("div");
                divCardSelection.classList.add("card", "col-12", "card-selection", "animation-selection");
                //Aggiunta offerte
                let listaOfferte = arr[i].offers;
                let freeRoomCount = arr[i].free_rooms;
                for (var e in listaOfferte) {
                    let divCardBody = document.createElement("div");
                    divCardBody.classList.add("card-body");
                    if (e == 0) {
                        divCardBody.classList.add("card-selezione-body");
                    }
                    let h5CardTitle = document.createElement("h5");
                    h5CardTitle.classList.add("card-title");
                    if (freeRoomCount < 5) {
                        let badgeAvailableRooms = document.createElement("span")
                        badgeAvailableRooms.classList.add("badge", "badge-danger");
                        badgeAvailableRooms.textContent = "Solo " + freeRoomCount + " rimaste";
                        $(h5CardTitle).append(badgeAvailableRooms);
                    }
                    if (listaOfferte[e].promotion) {
                        let badgePromotion = document.createElement("span")
                        badgePromotion.classList.add("badge", "badge-success");
                        badgePromotion.textContent = "IN OFFERTA";
                        $(h5CardTitle).append(badgePromotion);
                    }
                    $(divCardBody).append(h5CardTitle);
                    let divOffersBox = document.createElement("div");
                    divOffersBox.classList.add("box");
                    //Aggiunta nome offerta
                    let h6NomeOfferta = document.createElement("h6");
                    h6NomeOfferta.classList.add("card-subtitle", "offer-subtitle");
                    h6NomeOfferta.textContent = listaOfferte[e].offer_name;
                    $(divOffersBox).append(h6NomeOfferta);
                    //Aggiunta icone numero ospiti
                    let h6Guests = document.createElement("h6");
                    for (var a = 0; a < listaOfferte[e].maximum_guest; a++) {
                        $(h6Guests).append("<i class='fa fa-male'></i>");
                    }
                    $(divOffersBox).append(h6Guests);
                    $(divCardBody).append(divOffersBox);
                    //Aggiunta menu a tendina
                    let divOffersRowBox = document.createElement("div");
                    divOffersRowBox.classList.add("row", "box");
                    $(divOffersRowBox).css("margin-top", "4vh");
                    let divCol = document.createElement("div");
                    divCol.classList.add("col-4", "col-md-auto");
                    let divIcon = document.createElement("div");
                    divIcon.classList.add("form-group", "inputIcon");
                    $(divIcon).append("<i class='fa fa-bed'></i>");
                    let selectNumber = document.createElement("select");
                    selectNumber.id = listaOfferte[e].offer_id;
                    selectNumber.classList.add("form-control", "form-style", "select-offer", "room-offer" + e);
                    for (var a = 0; a <= 5; a++) {
                        $(selectNumber).append("<option>" + a + "</option>");
                    }
                    $(divIcon).append(selectNumber);
                    $(divCol).append(divIcon);
                    $(divOffersRowBox).append(divCol);
                    //Aggiunta prezzo offerta
                    let divOfferPrice = document.createElement("div");
                    divOfferPrice.classList.add("col-auto");
                    let h6OfferPrice = document.createElement("h6");
                    h6OfferPrice.textContent = "Totale ";
                    let spanOfferPrice = document.createElement("span");
                    spanOfferPrice.classList.add("roomOfferPrice");
                    spanOfferPrice.textContent = listaOfferte[e].offer_price + "€";
                    $(h6OfferPrice).append(spanOfferPrice);
                    $(divOfferPrice).append(h6OfferPrice);
                    $(divOffersRowBox).append(divOfferPrice);
                    $(divCardBody).append(divOffersRowBox);
                    $(divCardSelection).append(divCardBody);
                }
                $(rooms_container).append(divCardSelection);
                $(".card-selection").hide();
            }
        },
        error: function (data) {
            console.log("errore!");
        }
    });
}
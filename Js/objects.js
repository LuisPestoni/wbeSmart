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
function Room(roomID,roomType, freeRooms, price, tags, description_short, description_long, offers) {
    this.roomID = roomID;
    this.roomType = roomType;
    this.freeRooms = freeRooms;
    this.price = price;
    this.tags = tags;
    this.description_short = description_short;
    this.description_long = description_long;
    this.offers = offers;
}

//Oggetto offerte da inserire nelle camere
function Offer(offer_id, offer_name, offer_price, promotion, maximum_guest) {
    this.offer_id = offer_id;
    this.offer_name = offer_name;
    this.offer_price = offer_price;
    this.promotion = promotion;
    this.maximum_guest = maximum_guest;
}

function apiLaunch() {
    $.ajax({
        url: 'https://script.google.com/macros/s/AKfycbwyRMe5itYGQllEs1YTNImH7lAbLra1KzadHE-i8HEOVuO56hE/exec',
        type: 'POST',
        data: {
            "test": "test"
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
            const arr = data[0].rooms;
            const rooms_container = $("#rooms_container");
            for (var i in arr){
                let mainDiv = document.createElement("div");
                mainDiv.classList.add("card", "col-12", "room-padding", "room-card", "img-resize");
                mainDiv.id = arr[i].room_id;

                let divCardBody = document.createElement("div");
                divCardBody.classList.add("card-body");

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

                let h6Tags = document.createElement("h6");
                h6Tags.classList.add("card-subtitle", "mb-2", "text-muted");
                let tags = arr[i].tags;
                let tagsText = "";
                for (e in tags){
                    if(e < tags.length-1){
                        tagsText += tags[e] + " - ";
                    }else{
                        tagsText += tags[e] + "";
                    }
                }
                $(h6Tags).text(tagsText);
                $(divCardBody).append(tagsText);

                let divBoxRow = document.createElement("div");
                divBoxRow.classList.add("box", "row");

                //Continuare dal div Carrousel1 che in questo caso sarà carrousel + e


                $(divCardBody).append(divBoxRow);
                $(mainDiv).append(divCardBody);
                $(rooms_container).append(mainDiv);
            }


            // var Rooms = [];
            // for (var i in arr) {
            //     let arrOff = arr[i].offers;
            //     let Offers = [];
            //     for (var e in arrOff) {
            //         let offer = new Offer(
            //             arrOff[e].offer_id,
            //             arrOff[e].offer_name,
            //             arrOff[e].offer_price,
            //             arrOff[e].promotion,
            //             arrOff[e].maximum_guest);
            //         Offers.push(offer);
            //     }

            //     let room = new Room(
            //         arr[i].room_id,
            //         arr[i].room_type,
            //         arr[i].free_rooms,
            //         arr[i].price,
            //         arr[i].tags,
            //         arr[i].description_short,
            //         arr[i].description_complete,
            //         Offers);
            //         Rooms.push(room);
            // }
            // console.log(Rooms);
        },
        error: function(data) {
            console.log("errore!");
        }
    });
}
function dayInfo(day_number, available, minimum_day_price, month) {
    this.day_number = day_number;
    this.available = available;
    this.minimum_day_price = minimum_day_price;
    this.month = month;
}

// let January2020 = [];
// let dayJ1 = new dayInfo(1, true, "250€", "Gennaio 2020");
// let dayJ2 = new dayInfo(2, true, "250€", "Gennaio 2020");
// let dayJ3 = new dayInfo(3, false, "250€", "Gennaio 2020");
// let dayJ4 = new dayInfo(4, true, "650€", "Gennaio 2020");
// let dayJ5 = new dayInfo(5, true, "250€", "Gennaio 2020");
// let dayJ6 = new dayInfo(6, true, "450€", "Gennaio 2020");
// let dayJ7 = new dayInfo(7, false, "250€", "Gennaio 2020");
// let dayJ8 = new dayInfo(8, true, "250€", "Gennaio 2020");
// let dayJ9 = new dayInfo(9, true, "250€", "Gennaio 2020");
// let dayJ10 = new dayInfo(10, true, "250€", "Gennaio 2020");
// let dayJ11 = new dayInfo(11, true, "250€", "Gennaio 2020");
// let dayJ12 = new dayInfo(12, true, "250€", "Gennaio 2020");
// let dayJ13 = new dayInfo(13, false, "550€", "Gennaio 2020");
// let dayJ14 = new dayInfo(14, true, "650€", "Gennaio 2020");
// January2020.push(dayJ1, dayJ2, dayJ3, dayJ4, dayJ5, dayJ6, dayJ7, dayJ8, dayJ9, dayJ10, dayJ11, dayJ12, dayJ13, dayJ14);

// let February2020 = [];
// let dayF1 = new dayInfo(1, false, "350€", "Febbraio 2020");
// let dayF2 = new dayInfo(2, true, "850€", "Febbraio 2020");
// let dayF3 = new dayInfo(3, false, "250€", "Febbraio 2020");
// let dayF4 = new dayInfo(4, true, "950€", "Febbraio 2020");
// let dayF5 = new dayInfo(5, true, "150€", "Febbraio 2020");
// let dayF6 = new dayInfo(6, true, "450€", "Febbraio 2020");
// let dayF7 = new dayInfo(7, true, "250€", "Febbraio 2020");
// let dayF8 = new dayInfo(8, false, "250€", "Febbraio 2020");
// let dayF9 = new dayInfo(9, false, "250€", "Febbraio 2020");
// let dayF10 = new dayInfo(10, true, "250€", "Febbraio 2020");
// let dayF11 = new dayInfo(11, true, "250€", "Febbraio 2020");
// let dayF12 = new dayInfo(12, false, "450€", "Febbraio 2020");
// let dayF13 = new dayInfo(13, false, "350€", "Febbraio 2020");
// let dayF14 = new dayInfo(14, false, "850€", "Febbraio 2020");
// February2020.push(dayF1, dayF2, dayF3, dayF4, dayF5, dayF6, dayF7, dayF8, dayF9, dayF10, dayF11, dayF12, dayF13, dayF14);

// let nome1 = "Gennaio2020";
// let nome2 = "Febbraio2020";

const Months = {};
// Months[nome1] = January2020;
// Months[nome2] = February2020;
// console.log(Months[nome1][0].day_number);

function loadData() {
    $.ajax({
        url: 'baseJsonDettagliHotel.json',
        type: 'GET',
        dataType: "json",
        success: function (data) {
            //Parametri adulti e bambini
            const maxAdults = data.maxAdults;
            const maxChildren = data.maxChildren;
            const childrenMaxAge = data.childrenMaxAge;
            loadCounters(maxAdults, maxChildren, childrenMaxAge);
            createCookie("childrenMaxAge", childrenMaxAge, "10");
            createCookie("maxAdults", maxAdults, "10");

            //Parametri colori
            const mainColor = data.mainColor;
            const secondColor = data.secondColor;
            const thirdColor = data.thirdColor;
            const fourthColor = data.fourthColor;
            updateColors(mainColor, secondColor, thirdColor, fourthColor);

            //Calendario
            const arr = data.calendar;
            for (var i in arr) {
                let monthString = arr[i].month;
                Months[monthString] = arr[i].days;
            }
        },
        error: function (data) {
            console.log("errore!");
        }
    });
}

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
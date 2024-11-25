const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

const numberOfDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
let month = 10;
let year = 2024;
let week = 5;

function clearCalendar() {
    for (let i = 1; i <= 42; i++) {
        let dayCell = document.getElementById(i);
        dayCell.innerText = "";
        dayCell.style.color = "";
    }
}

function renderCalendar() {
    clearCalendar();
    let days = numberOfDays[month];
    if (month === 1 && year % 4 === 0) {
        days = 29; //leap year
    }

    week = new Date(year, month, 1).getDay();

    let dayCounter = 1;
    for (let i = week; i < week + days; i++) {
        let dayCell = document.getElementById(i + 1);
        dayCell.innerText = dayCounter;
        dayCounter++;
    }
}

function goBack() {
    month -= 1;
    if (month < 0) {
        month = 11;
        year -= 1;
    }
    getMonth();
    renderCalendar();
}

function goForward() {
    month += 1;
    if (month > 11) {
        month = 0;
        year += 1;
    }
    getMonth();
    renderCalendar();
}

function getMonth() {
    document.getElementById("time").innerText = months[month] + " " + year;
}

document.addEventListener("DOMContentLoaded", function () {
    getMonth();
});

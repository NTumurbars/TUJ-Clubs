<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    @vite('resources/css/calendar.css')

</head>
<body>
    <div class="calendar">
        <div class="calendar-header">
            <span id='time'>November 2024</span>
            <button class="back" onclick="goBack()"><</button>
            <button class="forward" onclick="goForward()">></button>
        </div>
        
        <table>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>

            </tr>
            <tr>
                <td class='weekend' id='1'></td>
                <td id='2'></td>
                <td id='3'></td>
                <td id='4'></td>
                <td id='5'></td>
                <td id='6'>1</td>
                <td class='weekend' id='7'>2</td>
            </tr>
            <tr>
                <td class='weekend' id='8'>3</td>
                <td id='9'>4</td>
                <td id='10'>5</td>
                <td id='11'>6</td>
                <td id='12'>7</td>
                <td id='13'>8</td>
                <td class='weekend' id='14'>9</td>
            </tr>
            <tr>
                <td class='weekend' id='15'>10</td>
                <td id='16'>11</td>
                <td id='17'>12</td>
                <td id='18'>13</td>
                <td id='19'>14</td>
                <td id='20'>15</td>
                <td class='weekend' id='21'>16</td>
            </tr>
            <tr>
                <td class='weekend' id='22'>17</td>
                <td id='23'>18</td>
                <td id='24'>19</td>
                <td id='25'>20</td>
                <td id='26'>21</td>
                <td id='27'>22</td>
                <td class='weekend' id='28'>23</td>
            </tr>
            <tr>
                <td class='weekend' id='29'>24</td>
                <td id='30'>25
                    <br>
                    <span class="label" id='30label1'></span>
                    <span class="label" id='30label2'></span>
                    <span class="label" id='30label3'></span>
                    <span class="label" id='30label4'></span>
                </td>
                <td id='31'>26
                    <br>
                    <span class="label" id='31label1'>Futsal Practice</span>
                    <span class="label" id='31label2'></span>
                    <span class="label" id='31label3'></span>
                    <span class="label" id='31label4'></span>
                </td>
                <td id='32'>27
                    <br>
                    <span class="label" id='32label1'></span>
                    <span class="label" id='32label2'></span>
                    <span class="label" id='32label3'></span>
                    <span class="label" id='32label4'></span>
                </td>
                    
                <td id='33'>28
                    <br>
                    <span class="label" id='33label1'>Labor Thanksgiving</span>
                    <span class="label" id='33label2'>Futsal Practice</span>
                    <span class="label" id='33label3'>Coding Club Meeting</span>
                    <span class="label" id='33label4'>Car Club Meeting</span>
                </td>
                <td id='34'>29
                    <br>
                    <span class="label" id='34label1'></span>
                    <span class="label" id='34label2'></span>
                    <span class="label" id='34label3'></span>
                    <span class="label" id='34label4'></span>   
                </td>
                <td class='weekend' id='35'>30
                    <br>
                    <span class="label" id='35label1'></span>
                    <span class="label" id='35label2'></span>
                    <span class="label" id='35label3'></span>
                    <span class="label" id='35label4'></span>   
                </td>
            </tr>
            <tr>
                <td class='weekend' id='36'></td>
                <td id='37'></td>
                <td id='38'></td>
                <td id='39'></td>
                <td id='40'></td>
                <td id='41'></td>
                <td class='weekend' id='42'></td>
            </tr>
        </table>
    </div>

    <script>
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const numberOfDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        let month = 10;  
        let year = 2024;
        let week = 5;

        function clearCalendar() 
        {
            for (let i = 1; i <= 42; i++) 
            {
                let dayCell = document.getElementById(i);
                dayCell.innerText = '';  
                dayCell.style.color = '';  
            }
        }

        function renderCalendar() 
        {
            clearCalendar(); 
            let days = numberOfDays[month];
            if (month === 1 && year % 4 === 0) 
            {
                days = 29; //leap year
            }

            week = new Date(year, month, 1).getDay();  
    
            let dayCounter = 1;
            for (let i = week; i < week + days; i++) 
            {
                let dayCell = document.getElementById(i + 1); 
                dayCell.innerText = dayCounter;
                dayCounter++;
            }

            
            
            validDays(); 

        }

function validDays() {
    for (let i = 1; i <= week; i++) {
        let day = document.getElementById(i);
        day.style.color = 'lightgray';  
    }

    for (let i = week + numberOfDays[month] + 1; i <= 42; i++) {
        let day = document.getElementById(i);
        day.style.color = 'lightgray'; 
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
    document.getElementById('time').innerText = months[month] + " " + year;
    }

        document.addEventListener("DOMContentLoaded", function () {
        getMonth();

    });
        
    </script>
</body>
</html>
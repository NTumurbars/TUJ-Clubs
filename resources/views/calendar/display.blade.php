<x-layout>
    <div class="c-body">
    
    <div class="calendar">
        <div class="c-header">
            <span id='time'>November 2024</span>
            <button class="back" onclick="goBack()">
                <</button>
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
                <td class="weekend" id="1">
                    <br>
                    <span id="1-span1"></span>
                    <br>
                    <span id="1-span2"></span>
                    <br>
                    <span id="1-span3"></span>
                </td>
                <td id="2">
                    <br>
                    <span id="2-span1"></span>
                    <br>
                    <span id="2-span2"></span>
                    <br>
                    <span id="2-span3"></span>
                </td>
                <td id="3">
                    <br>
                    <span id="3-span1"></span>
                    <br>
                    <span id="3-span2"></span>
                    <br>
                    <span id="3-span3"></span>
                </td>
                <td id="4">
                    <br>
                    <span id="4-span1"></span>
                    <br>
                    <span id="4-span2"></span>
                    <br>
                    <span id="4-span3"></span>
                </td>
                <td id="5">
                    <br>
                    <span id="5-span1"></span>
                    <br>
                    <span id="5-span2"></span>
                    <br>
                    <span id="5-span3"></span>
                </td>
                <td id="6">1
                    <br>
                    <span id="6-span1"></span>
                    <br>
                    <span id="6-span2"></span>
                    <br>
                    <span id="6-span3"></span>
                </td>
                <td class="weekend" id="7">2
                    <br>
                    <span id="7-span1">apple</span>
                    <br>
                    <span id="7-span2">grape</span>
                    <br>
                    <span id="7-span3">banana</span>
                </td>
            </tr>
            <tr>
                <td class="weekend" id="8">3
                    <br>
                    <span id="8-span1"></span>
                    <br>
                    <span id="8-span2"></span>
                    <br>
                    <span id="8-span3"></span>
                </td>
                <td id="9">4
                    <br>
                    <span id="9-span1"></span>
                    <br>
                    <span id="9-span2"></span>
                    <br>
                    <span id="9-span3"></span>
                </td>
                <td id="10">5
                    <br>
                    <span id="10-span1"></span>
                    <br>
                    <span id="10-span2"></span>
                    <br>
                    <span id="10-span3"></span>
                </td>
                <td id="11">6
                    <br>
                    <span id="11-span1"></span>
                    <br>
                    <span id="11-span2"></span>
                    <br>
                    <span id="11-span3"></span>
                </td>
                <td id="12">7
                    <br>
                    <span id="12-span1"></span>
                    <br>
                    <span id="12-span2"></span>
                    <br>
                    <span id="12-span3"></span>
                </td>
                <td id="13">8
                    <br>
                    <span id="13-span1"></span>
                    <br>
                    <span id="13-span2"></span>
                    <br>
                    <span id="13-span3"></span>
                </td>
                <td class="weekend" id="14">9
                    <br>
                    <span id="14-span1"></span>
                    <br>
                    <span id="14-span2"></span>
                    <br>
                    <span id="14-span3"></span>
                </td>
            </tr>
            <tr>
    <td class="weekend" id="15">10
        <br>
        <span id="15-span1"></span>
        <br>
        <span id="15-span2"></span>
        <br>
        <span id="15-span3"></span>
    </td>
    <td id="16">11
        <br>
        <span id="16-span1"></span>
        <br>
        <span id="16-span2"></span>
        <br>
        <span id="16-span3"></span>
    </td>
    <td id="17">12
        <br>
        <span id="17-span1"></span>
        <br>
        <span id="17-span2"></span>
        <br>
        <span id="17-span3"></span>
    </td>
    <td id="18">13
        <br>
        <span id="18-span1"></span>
        <br>
        <span id="18-span2"></span>
        <br>
        <span id="18-span3"></span>
    </td>
    <td id="19">14
        <br>
        <span id="19-span1"></span>
        <br>
        <span id="19-span2"></span>
        <br>
        <span id="19-span3"></span>
    </td>
    <td id="20">15
        <br>
        <span id="20-span1"></span>
        <br>
        <span id="20-span2"></span>
        <br>
        <span id="20-span3"></span>
    </td>
    <td class="weekend" id="21">16
        <br>
        <span id="21-span1"></span>
        <br>
        <span id="21-span2"></span>
        <br>
        <span id="21-span3"></span>
    </td>
</tr>
<tr>
    <td class="weekend" id="22">17
        <br>
        <span id="22-span1"></span>
        <br>
        <span id="22-span2"></span>
        <br>
        <span id="22-span3"></span>
    </td>
    <td id="23">18
        <br>
        <span id="23-span1"></span>
        <br>
        <span id="23-span2"></span>
        <br>
        <span id="23-span3"></span>
    </td>
    <td id="24">19
        <br>
        <span id="24-span1"></span>
        <br>
        <span id="24-span2"></span>
        <br>
        <span id="24-span3"></span>
    </td>
    <td id="25">20
        <br>
        <span id="25-span1"></span>
        <br>
        <span id="25-span2"></span>
        <br>
        <span id="25-span3"></span>
    </td>
    <td id="26">21
        <br>
        <span id="26-span1"></span>
        <br>
        <span id="26-span2"></span>
        <br>
        <span id="26-span3"></span>
    </td>
    <td id="27">22
        <br>
        <span id="27-span1"></span>
        <br>
        <span id="27-span2"></span>
        <br>
        <span id="27-span3"></span>
    </td>
    <td class="weekend" id="28">23
        <br>
        <span id="28-span1"></span>
        <br>
        <span id="28-span2"></span>
        <br>
        <span id="28-span3"></span>
    </td>
</tr>
<tr>
    <td class="weekend" id="29">24
        <br>
        <span id="29-span1"></span>
        <br>
        <span id="29-span2"></span>
        <br>
        <span id="29-span3"></span>
    </td>
    <td id="30">25
        <br>
        <span id="30-span1"></span>
        <br>
        <span id="30-span2"></span>
        <br>
        <span id="30-span3"></span>
    </td>
    <td id="31">26
        <br>
        <span id="31-span1"></span>
        <br>
        <span id="31-span2"></span>
        <br>
        <span id="31-span3"></span>
    </td>
    <td id="32">27
        <br>
        <span id="32-span1"></span>
        <br>
        <span id="32-span2"></span>
        <br>
        <span id="32-span3"></span>
    </td>
    <td id="33">28
        <br>
        <span id="33-span1"></span>
        <br>
        <span id="33-span2"></span>
        <br>
        <span id="33-span3"></span>
    </td>
    <td id="34">29
        <br>
        <span id="34-span1"></span>
        <br>
        <span id="34-span2"></span>
        <br>
        <span id="34-span3"></span>
    </td>
    <td class="weekend" id="35">30
        <br>
        <span id="35-span1"></span>
        <br>
        <span id="35-span2"></span>
        <br>
        <span id="35-span3"></span>
    </td>
</tr>
<tr>
    <td class="weekend" id="36">
        <br>
        <span id="36-span1"></span>
        <br>
        <span id="36-span2"></span>
        <br>
        <span id="36-span3"></span>
    </td>
    <td id="37">
        <br>
        <span id="37-span1"></span>
        <br>
        <span id="37-span2"></span>
        <br>
        <span id="37-span3"></span>
    </td>
    <td id="38">
        <br>
        <span id="38-span1"></span>
        <br>
        <span id="38-span2"></span>
        <br>
        <span id="38-span3"></span>
    </td>
    <td id="39">
        <br>
        <span id="39-span1"></span>
        <br>
        <span id="39-span2"></span>
        <br>
        <span id="39-span3"></span>
    </td>
    <td id="40">
        <br>
        <span id="40-span1"></span>
        <br>
        <span id="40-span2"></span>
        <br>
        <span id="40-span3"></span>
    </td>
    <td id="41">
        <br>
        <span id="41-span1"></span>
        <br>
        <span id="41-span2"></span>
        <br>
        <span id="41-span3"></span>
    </td>
    <td class="weekend" id="42">
        <br>
        <span id="42-span1"></span>
        <br>
        <span id="42-span2"></span>
        <br>
        <span id="42-span3"></span>
    </td>
</tr>

        </table>
    </div>
    </div>
    <script>
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

        function clearCalendar() {
            for (let i = 1; i <= 42; i++) {
                let dayCell = document.getElementById(i);
                if (dayCell) {
                    dayCell.innerText = "";
                    dayCell.style.color = "";
                }
            }
        }

        function renderCalendar() {
            clearCalendar();
            let days = numberOfDays[month];
            if (month === 1 && year % 4 === 0) {
                days = 29; 
            }

            const week = new Date(year, month, 1).getDay();
            let dayCounter = 1;

            for (let i = week; i < week + days; i++) {
                const dayCell = document.getElementById(i + 1);
                dayCell.innerText = dayCounter++;
                
            }

            dayCounter = 1;
            for (let i = week + days; i < 42; i++)
            {
                const dayCell = document.getElementById(i + 1);
                dayCell.innerText = dayCounter++;
                
            }

            validDays();
        }

        function validDays() 
        {
            const week = new Date(year, month, 1).getDay();
            for (let i = week + numberOfDays[month] + 1; i <= 42; i++) 
            {
                let day = document.getElementById(i);
                day.style.color = "darkgray";
            }
        }

        function goBack() {
            month -= 1;
            if (month < 0) {
                month = 11;
                year -= 1;
            }
            updateCalendar();
        }

        function goForward() {
            month += 1;
            if (month > 11) {
                month = 0;
                year += 1;
            }
            updateCalendar();
        }

        function updateCalendar() {
            getMonth();
            renderCalendar();
        }

        function getMonth() {
            document.getElementById("time").innerText = months[month] + " " + year;
        }

        
    </script>


</x-layout>

<x-layout>
    <div class="c-body">

        <div class="calendar">
            <div class="c-header">
                <span id='time'>November 2024</span>
                <button class="back" onclick="goBack()">&lt;</button>
                <button class="forward" onclick="goForward()">&gt;</button>
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
                    <td id='30'>25</td>
                    <td id='31'>26</td>
                    <td id='32'>27</td>
                    <td id='33'>28</td>
                    <td id='34'>29</td>
                    <td class='weekend' id='35'>30</td>
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
    </div>
    <script>
        const globalPosts = @json($globalPosts);
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

        //clears the calendar
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
                days = 29; //checks leap year 
            }

            week = new Date(year, month, 1).getDay(); //getDay() gives day of the week (0=sunday, 1=monday, etc)
            let dayCounter = 1;
            for (let i = week; i < week + days; i++) {
                let dayCell = document.getElementById(i + 1);
                dayCell.innerText = dayCounter;

                //finds posts from the dates
                const dayPosts = globalPosts.filter(post => {
                    const postDate = new Date(post.start_date);
                    return (
                        postDate.getFullYear() === year &&
                        postDate.getMonth() === month &&
                        postDate.getDate() === dayCounter
                    );
                });

                //each post is appended under the date
                dayPosts.forEach(post => {
                    const postSpan = document.createElement('span');
                    postSpan.textContent = post.title;
                    postSpan.style.display = 'block';
                    postSpan.style.fontSize = '13px';
                    postSpan.style.fontWeight = 'normal';
                    postSpan.style.textAlign = 'left';
                    postSpan.style.backgroundColor = 'khaki';
                    postSpan.style.borderRadius = '5px';
                    postSpan.style.marginBottom = '3px';
                    dayCell.appendChild(postSpan);
                });

                dayCounter++;
            }
        }

        //loads the previous month
        function goBack() {
            month -= 1;
            if (month < 0) {
                month = 11;
                year -= 1;
            }
            getMonth();
            renderCalendar();
        }

        //loads the next month
        function goForward() {
            month += 1;
            if (month > 11) {
                month = 0;
                year += 1;
            }
            getMonth();
            renderCalendar();
        }

        //updates the title
        function getMonth() {
            document.getElementById("time").innerText = months[month] + " " + year;
        }

        //calls the these function at the start
        document.addEventListener("DOMContentLoaded", function() {
            getMonth();
            renderCalendar();
        });
    </script>

</x-layout>

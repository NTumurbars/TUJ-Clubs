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
    @vite('resources/js/calendar.js')

</x-layout>

TUJ-Clubs Application Report

Required Tech:
Laptop or PC (Tested on Windows 11 and Mac M3)
Laravel Herd
Node.js –version: 22.9.0 (Inside Laravel Herd)
PHP –version: 8.3 (Inside Laravel Herd)
VSCode
Composer
MySQL Workbench
Browser (Chrome, Brave)

Basic Setup:
Download MySQL Workbench: From the MySQL Community Downloads, follow the installation steps to download it. After the installation, open the application to create a server and a schema (inside the server). IMPORTANT: Remember your server name, port number (by default it should be 3306), your server’s password and schema’s name [we need it later].

Download Laravel Herd: Follow the installation instructions. Make sure to download the full support file (package with node and php). NOTE: Change the versions of php and node to the specified versions.

Download A Browser: Either Chrome or Brave since these are the ones we tested.

Install Composer version 2.8.2.

Download the zip file containing the project and extract the file. Use VSCode to open the extracted folder. Make changes in env file under the databases fields to match your database setup
{
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tuj_club
DB_USERNAME=root
DB_PASSWORD=1234
}

Now open terminals using the terminal option on the top left of VSCode. Copy paste the following commands into the terminal (one at a time)
php artisan migrate:fresh
composer install
composer require laravel/socialite
composer require livewire/livewire
php artisan install:broadcasting
npm install
npm run build

Make sure that your ports 5173, 8000, 8080 are available. Now open 2 more terminals and run the following commands in their respective terminals:
php artisan serve
npm run dev
php artisan reverb:start

Upon running everything without errors use the link below to access TUJ-clubs  
http://localhost:8000/

NOTE:
Opening the extracted file in VSCode might throw some warnings and the project setup would require the user to grant some permissions. The warnings are due to the absence of “signature” (which is used to make sure that the code you receive isn't being tempered on its way. We would love you to trust us), so ignore them and grant the required permissions

Citation
Used for creating a layout of the calendar
https://www.w3schools.com/html/html_tables.asp
Used for creating routes, controllers, migrations, policies, and views
https://laravel.com/docs/11.x
Referenced some of the js functionalities to update the calendar as well as some css
https://www.youtube.com/watch?v=C-rODtCYUbo
Used for calling calendar’s js functions when first loaded
https://developer.mozilla.org/en-US/docs/Web/API/Document/DOMContentLoaded_event
Used to extract the day, the month, and the year from the calendar about the global posts
https://www.w3schools.com/js/js_date_methods.asp
Used to find all global posts to display in the calendar by using @json (Rendering Json)
https://laravel.com/docs/10.x/blade#rendering-json
Referenced for the chat feature
https://www.youtube.com/watch?v=RPRVMbR75KI
Used for building dynamic, reactive user interfaces
https://laravel-livewire.com/
General CSS
Shoutout to the best professor ever, Farid Nakhle
Tailwind for CSS
https://tailwindui.com/components
Navbar design (HTML and CSS) - https://flowbite.com/docs/components/navbar/
Message alert design (HTML and CSS)
https://tailwindui.com/components/application-ui/feedback/alerts

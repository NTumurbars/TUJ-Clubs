TUJ-Clubs Application Report
Table of Contents
Prerequisites
Basic Setup
1. Install MySQL Workbench
2. Install Laravel Herd
3. Install a Browser
4. Install Composer
5. Set Up the Project
6. Install Dependencies and Migrate Database
7. Start the Development Servers
8. Access the Application
Notes
Citations and References
Acknowledgments
Prerequisites
Ensure you have the following installed:

Laptop or PC (Tested on Windows 11 and Mac M3)
Laravel Herd
Node.js version 22.9.0 (inside Laravel Herd)
PHP version 8.3 (inside Laravel Herd)
VSCode
Composer version 2.8.2
MySQL Workbench
Browser (Chrome or Brave)
Basic Setup
1. Install MySQL Workbench
Download from MySQL Community Downloads.
Follow the installation steps.
After installation:
Open MySQL Workbench.
Create a server and a schema.
Important: Remember your server name, port number (default is 3306), server password, and schema name.
2. Install Laravel Herd
Download from Laravel Herd.
Follow the installation instructions.
Ensure you download the full support package (includes Node.js and PHP).
Note: Set PHP and Node.js to the specified versions.
3. Install a Browser
Install either Chrome or Brave.
4. Install Composer
Download Composer version 2.8.2 from getcomposer.org.
5. Set Up the Project
Download the Project

Obtain the ZIP file containing the project.
Extract the contents.
Open in VSCode

Launch VSCode.
Open the extracted project folder.
Configure Environment Variables

Locate the .env file.

Update the database fields:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tuj_club
DB_USERNAME=root
DB_PASSWORD=1234
6. Install Dependencies and Migrate Database
Open the Terminal in VSCode

Go to Terminal > New Terminal.
Run Commands

Execute the following one at a time:

bash
Copy code
composer install
composer require laravel/socialite
composer require livewire/livewire
php artisan migrate:fresh
php artisan install:broadcasting
npm install
npm run build
7. Start the Development Servers
Ensure ports 5173, 8000, and 8080 are free.

Open three terminals in VSCode.

Run the following in separate terminals:

Terminal 1:

bash
Copy code
php artisan serve
Terminal 2:

bash
Copy code
npm run dev
Terminal 3:

bash
Copy code
php artisan reverb:start
8. Access the Application
Open your browser.
Navigate to http://localhost:8000/.
Notes
VSCode Warnings:
You may encounter warnings or permission prompts due to missing code signatures.
Recommendation: Ignore these warnings and grant the required permissions.
Citations and References
Calendar Layout:

HTML Tables
Laravel Documentation:

Laravel Docs (v11.x)
JavaScript and CSS for Calendar:

YouTube Tutorial
DOMContentLoaded Event:

MDN Web Docs
JavaScript Date Methods:

W3Schools Date Methods
Rendering JSON in Blade:

Blade Templates
Chat Feature Reference:

YouTube Tutorial
Laravel Livewire:

Livewire Official Site
Tailwind CSS Components:

Tailwind UI
Navbar Design:

Flowbite Navbar
Message Alert Design:

Tailwind UI Alerts
Acknowledgments
Special Thanks: To Professor Farid Nakhle for guidance and support.

# TUJ-Clubs Application Report

## Required Technologies

-   **Laptop or PC**: Tested on Windows 11 and Mac M3
-   **Laravel Herd**: PHP development environment
-   **Node.js**: Version 22.9.0 (included with Laravel Herd)
-   **PHP**: Version 8.3 (included with Laravel Herd)
-   **VSCode**: Code editor
-   **Composer**: Dependency manager
-   **MySQL Workbench**: Database management tool
-   **Browser**: Chrome or Brave (tested)

## Basic Setup Instructions

### Step 1: Install Required Tools

1. **MySQL Workbench**:

    - Download from [MySQL Community Downloads](https://dev.mysql.com/downloads/workbench/).
    - Follow the installation instructions.
    - Create a server and a schema (database).
    - **IMPORTANT**: Note down your server name, port number (default: 3306), server password, and schema name. You'll need these later.

2. **Laravel Herd**:

    - Follow the [installation instructions for Laravel Herd](https://herd.laravel.com/). Make sure to download the full support file package (which includes Node and PHP).
    - Update PHP and Node versions to match the required versions: Node.js 22.9.0 and PHP 8.3.

3. **Browser**:

    - Download either Chrome or Brave.

4. **Composer**:
    - Install Composer, version 2.8.2. [Download here](https://getcomposer.org/download/).

### Step 2: Project Setup

1. **Download and Extract Project**:

    - Download the ZIP file containing the project and extract it.
    - Use **VSCode** to open the extracted folder.

2. **Database Configuration**:
    - Edit the `.env` file to update the database configuration fields to match your setup. Update as follows:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=tuj_club
        DB_USERNAME=root
        DB_PASSWORD=1234
        ```

### Step 3: Installing Dependencies and Running the Application

1. **Open VSCode Terminal**:

    - Use the terminal option in VSCode to open a terminal.
    - Run the following commands, one by one:
        ```sh
        php artisan migrate:fresh
        composer install
        composer require laravel/socialite
        composer require livewire/livewire
        php artisan install:broadcasting
        npm install
        npm run build
        ```

2. **Check Port Availability**:

    - Make sure the following ports are available: **5173**, **8000**, **8080**.

3. **Run the Application**:

    - Open three more terminals in VSCode.
    - Run the following commands in their respective terminals:
        ```sh
        php artisan serve
        npm run dev
        php artisan reverb:start
        ```

4. **Access the Application**:
    - If everything runs without errors, open [http://localhost:8000/](http://localhost:8000/) to access the TUJ-Clubs application.

### Notes

-   When opening the extracted file in VSCode, you might encounter some warnings and be asked to grant permissions.
-   These warnings are related to the absence of a code signature, which verifies the integrity of the received code. Please trust the source and proceed to grant the necessary permissions.

## Citation

The following resources were referenced or used during development:

1. **Calendar Layout**: [W3Schools HTML Tables](https://www.w3schools.com/html/html_tables.asp)
2. **Laravel Documentation** (Routes, Controllers, Migrations, Policies, Views): [Laravel Docs](https://laravel.com/docs/11.x)
3. **JavaScript Functionalities**: [YouTube Video](https://www.youtube.com/watch?v=C-rODtCYUbo)
4. **DOM Content Loaded Event**: [MDN Documentation](https://developer.mozilla.org/en-US/docs/Web/API/Document/DOMContentLoaded_event)
5. **Date Methods in JavaScript**: [W3Schools JavaScript Date Methods](https://www.w3schools.com/js/js_date_methods.asp)
6. **Rendering JSON in Blade Templates**: [Laravel Documentation](https://laravel.com/docs/10.x/blade#rendering-json)
7. **Chat Feature**: [YouTube Tutorial](https://www.youtube.com/watch?v=RPRVMbR75KI)
8. **Dynamic, Reactive User Interfaces**: [Laravel Livewire](https://laravel-livewire.com/)
9. **CSS Styling**:
    - **Tailwind for CSS**: [Tailwind UI](https://tailwindui.com/components)
    - **Navbar Design**: [Flowbite Navbar](https://flowbite.com/docs/components/navbar/)
    - **Message Alert Design**: [Tailwind Alerts](https://tailwindui.com/components/application-ui/feedback/alerts)

**Shoutout**: To the best professor ever, **Farid Nakhle**, for the guidance and support.

---

Feel free to contribute or reach out if you have any questions or issues with setting up the project.

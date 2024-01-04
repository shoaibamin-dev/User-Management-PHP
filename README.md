# User Management PHP Project

This PHP project focuses on user management, providing an admin panel with CRUD (Create, Read, Update, Delete) functionality. The project uses a MySQL database to store user information and includes the necessary files for admin login, user registration, user editing, and user deletion.

## Project Structure

The main project files are organized as follows:

- `admin_login.php`: Admin login page.
- `admin_panel.php`: Admin panel page.
- `login.php`: User login page.
- `regester.php`: User registration page.
- `user_edit.php`: User editing page.
- `user_delete.php`: User deletion page.
- `logout.php`: Logout functionality.
- `mysqli_connect.php`: PHP script for establishing a connection to the MySQL database.
- `users.sql`: SQL script for creating the users table in the database.

### Assets

The project includes an `assets` directory containing subdirectories for CSS, images, and SCSS:

- **CSS**: `assets/css/styles.css` - Stylesheet for the project.
- **Images**: `assets/img` - Contains image resources, including `img-login.svg`.
- **SCSS**: `assets/scss/styles.scss` - SCSS source file for styling.

## Setup and Configuration

Follow these steps to set up and run the project using XAMPP:

1. **Download and Install XAMPP**: Download [XAMPP](https://www.apachefriends.org/index.html) and follow the installation instructions for your operating system.

2. **Start Apache and MySQL Servers**: Launch XAMPP and start both the Apache and MySQL servers.

3. **Database Setup**:
   - Open your web browser and navigate to `http://localhost/phpmyadmin`.
   - Create a new database named `users`.
   - Import the `users.sql` file to create the `users` table within the database.

4. **Project Configuration**:
   - Place the entire project folder within the `htdocs` directory of your XAMPP installation.

5. **Access the Project**:
   - Open your web browser and go to `http://localhost/<your_project_folder>/admin_login.php`.

## Usage

- Admin Login: Use the `admin_login.php` page to log in as an administrator.
- Admin Panel: After logging in, you can access the admin panel (`admin_panel.php`) to manage users.
- User Registration, Edit, and Delete: These functionalities are accessible through `regester.php`, `user_edit.php`, and `user_delete.php` pages, respectively.

## Important Notes

- Ensure you have XAMPP installed and properly configured.
- Verify the connection details in `mysqli_connect.php` to match your MySQL configuration.

Feel free to explore and adapt the project for your needs. If you encounter any issues or have suggestions for improvement, please don't hesitate to reach out.

Happy coding! 🚀
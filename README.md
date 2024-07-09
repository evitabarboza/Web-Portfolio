# Evita's Developer Portfolio
This is a simple portfolio website which showcases skills, services and contact information. Built with HTML, CSS, PHP, and MySQL, it features a responsive design, a contact form with database integration, and links to social media profiles.

---

## Overview

This is a simple portfolio website of Evita Barboza, showcasing her skills, services and contact information. The website is built using HTML, CSS, PHP, and MySQL. It features a navigation menu, several sections including Home, About, Services, Contact Me, and a Login/SignUp page. The contact form allows users to submit their details, which are stored in a MySQL database.

## Features

- **Responsive Design:** The website is fully responsive and works on various devices and screen sizes.
- **Navigation Menu:** A user-friendly navigation menu to browse different sections of the website.
- **Contact Form:** A contact form to collect user information such as name, email, phone number, company worked, and the specific role desired.
- **Database Integration:** User details from the contact form are stored in a MySQL database.
- **Social Media Links:** Links to Evita's Instagram, LinkedIn, GitHub, and Twitter profiles.

## Technologies Used

- **HTML:** For the structure of the web pages.
- **CSS:** For styling and layout.
- **PHP:** For server-side scripting and database interaction.
- **MySQL:** For storing contact form data.
- **JavaScript:** For form validation and interactive elements.
- **Font Awesome:** For social media icons.

## Installation and Setup

### Prerequisites

- XAMPP or any other local server environment
- Web browser (e.g., Chrome, Firefox)

### Steps

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/evitabarboza/portfolio.git
   ```
2. **Start XAMPP:**
   - Open XAMPP and start Apache and MySQL modules.

3. **Import the Database:**
   - Open phpMyAdmin.
   - Create a new database named `webpage1`.
   - Import the provided SQL file (`webpage1.sql`) to create the necessary table `details2`.

4. **Place Files in XAMPP Directory:**
   - Copy the cloned repository files to `xampp/htdocs/portfolio`.

5. **Configure Database Connection:**
   - Open `contact.php` and ensure the database credentials match your setup:
     
     ```php
     $host = 'localhost';
     $user = 'root';
     $password = '';
     $dbname = 'webpage1';
     ```

6. **Run the Application:**
   - Open a web browser and navigate to `http://localhost/portfolio`.

## Usage

- Navigate through the different sections using the navigation menu.
- Fill out and submit the contact form to test database integration.
- Check the database (`details2` table) in phpMyAdmin to see the submitted data.

## Project Structure

```
portfolio/
│
├── index.html            # Home page
├── about.html            # About page
├── services.html         # Services page
├── contact.php           # Contact page with form and PHP logic
├── signup.php            # Login/SignUp page
│
├── css/
│   └── contact.css       # Styles for contact page
│
├── js/
│   └── script.js         # JavaScript for form validation
│
├── images/               # Image assets
│
└── README.md             # This file
```

## Contributing

If you have any suggestions or improvements, feel free to submit a pull request or open an issue on the GitHub repository.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Contact

For any inquiries, please contact me at evitabarboza195@gmail.com.

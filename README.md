# Link Shortener

This project is a simple link shortener application built with PHP and MySQL. It allows users to enter a long URL and receive a shortened URL in return. The shortened URL is generated using a cryptographically secure random number generator to ensure uniqueness.

## Requirements

- PHP 7 or higher
- MySQL 5.7 or higher

## Installation

1. Create a MySQL database named `link_shortener`.
2. Create a table named `links` with the following columns:
   - `id` (INT, AUTO_INCREMENT, PRIMARY KEY)
   - `long_url` (VARCHAR(255), NOT NULL)
   - `short_url` (VARCHAR(50), NOT NULL, UNIQUE)
3. Copy the `link_shortener.php` file to the web server's root directory.
4. Access the link shortener application by visiting http://localhost/link-shortener.php.

## Usage

1. Enter the long URL you want to shorten in the form.
2. Click the "Shorten URL" button.
3. The shortened URL will be displayed.

## Credit
Thanks to @ConnorTews 

## License

This project is licensed under the MIT License.

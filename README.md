# Information Technologies Term Project

A multi-page responsive website built as the final term project for my graduate Information Technologies course at Rutgers University, taught by Professor Anselm Spoerri. [Full assignment details](https://aspoerri.comminfo.rutgers.edu/Teaching/InfoTech/Exercises.html#TermProject).

## About

This site brings together everything covered across the semester — HTML5, CSS, Bootstrap 4, JavaScript, PHP, and MySQL — into one functional, responsive site. It's organized into four sections: **Home**, **Info Tech**, **Interests**, and **About**.

Built entirely by me, front to back, including page layout and design, the interactive JavaScript features, and the PHP/MySQL-backed survey system.

## Features

- **Responsive Bootstrap 4 layout** with a custom-themed, collapsible mobile navigation bar
- **Open-source technology evaluation** (Drupal) with rollover images and comparison cards, informed by my real professional experience managing Drupal sites at Rutgers Student Affairs
- **Interactive survey system**: a client-validated preference form (`survey.html`) plus a second usability-rating survey (`tools-survey.php`) that submits to a MySQL database via a prepared-statement PHP backend (`submit.php`), with results aggregated and displayed dynamically (`results.php`)
- **JavaScript-driven UI interactions**: image rollovers/hover effects, Bootstrap carousel with custom captions, collapsible content panels, tabbed content, and active-nav-link highlighting
- **Personal "Interests" section**: a rom-com-themed multimedia showcase with a hero carousel, embedded YouTube trailers, and hover-reveal movie cards

## Tech Stack

- HTML5, CSS3
- Bootstrap 4
- JavaScript (vanilla + jQuery)
- PHP (server-side form handling, prepared statements)
- MySQL (persistent survey data storage)

## Project Structure

```
├── home.html              Landing page
├── about.html              About Me page
├── intro.html               Info Tech section intro
├── open-source.html    Drupal open-source tool evaluation
├── survey.html              Drupal preference survey (client-side validated)
├── tools.html                Info tech tools overview
├── tools-survey.php     Usability rating survey (submits to MySQL)
├── submit.php               Handles survey submission via prepared statements
├── results.php              Displays aggregated survey results from MySQL
├── movie1.html               "10 Things I Hate About You"
├── movie2.html               "How to Lose a Guy in 10 Days"
├── movie3.html               "27 Dresses"
├── styles.css                  Global theme and layout styles
├── scripts.js                   Shared JS: active nav, rollovers, form validation
├── config.example.php  Template for database config (copy to config.php locally)
└── .gitignore
```

## Setup Note

`config.php` (real database credentials) is intentionally excluded from this repository. To run the PHP/MySQL features locally, copy `config.example.php` to `config.php` and fill in your own database credentials.

## Course Context

Built for a graduate-level Information Technologies course, Rutgers School of Communication and Information, under Professor Anselm Spoerri.

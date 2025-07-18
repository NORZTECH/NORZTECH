# CPD Program Evaluation Form PDF Generator

This project generates a printable CPD (Continuous Professional Development) Program Evaluation Form for Caraga Regional Hospital using mPDF library.

## Features

- Professional PDF layout with hospital branding
- Three-part evaluation form:
  - Part I: Learning Intervention Evaluation (1-5 rating scale)
  - Part II: Learning Provider Evaluation (1-4 rating scale)
  - Part III: Additional Comments and Suggestions
- Printable checkboxes and fillable fields
- Signature sections for participants
- A4 format with proper margins

## Requirements

- PHP 7.4 or higher
- Composer
- mPDF library

## Installation

1. Clone or download this project
2. Install dependencies using Composer:
   ```bash
   composer install
   ```

## Usage

1. Run the PHP script directly:
   ```bash
   php cpd_evaluation_form.php
   ```

2. Or serve it through a web server and access via browser:
   ```bash
   php -S localhost:8000
   ```
   Then visit: `http://localhost:8000/cpd_evaluation_form.php`

## Output Options

The script offers several output methods (change in the code):

- `'D'` - Force download
- `'I'` - Display in browser
- `'F'` - Save to file
- `'S'` - Return as string

## Customization

You can modify the following in `cpd_evaluation_form.php`:

- Form content and questions
- Styling and colors
- Page margins and orientation
- Hospital information and branding
- Output filename and method

## File Structure

```
├── cpd_evaluation_form.php    # Main PHP script
├── composer.json              # Dependencies
├── README.md                  # This file
└── vendor/                    # Composer dependencies (after install)
```

## License

This project is created for Caraga Regional Hospital's internal use.

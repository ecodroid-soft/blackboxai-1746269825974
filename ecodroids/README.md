# EcoDroids Website

A dynamic website for EcoDroids digital solutions company, featuring location-based service pages across India.

## Features

- Clean, modern design using Tailwind CSS
- Dynamic service pages for each location
- Contact and quote forms with email integration
- Comprehensive SEO optimization
- Mobile-responsive design
- Location-based content
- Automatic sitemap generation

## Directory Structure

```
ecodroids/
├── assets/
│   ├── images/
│   └── uploads/
├── components/
│   ├── header.php
│   └── footer.php
├── includes/
│   ├── config.php
│   ├── mail.php
│   ├── generate-sitemap.php
│   └── generate-location-pages.php
├── locations/
│   ├── data/
│   │   ├── states.php
│   │   └── districts.php
│   └── [state]/
│       └── [district]/
│           └── [service].php
├── services/
│   └── [service].php
├── logs/
├── sitemaps/
├── .htaccess
├── index.php
├── contact.php
├── quote.php
└── start-server.php
```

## Setup Instructions

1. Configure your email settings in `includes/config.php`
2. Install dependencies:
   ```bash
   composer require phpmailer/phpmailer
   ```

3. Start the development server:
   ```bash
   php start-server.php
   ```

4. Access the website at `http://localhost:8000`

## Email Configuration

Update the following settings in `includes/config.php`:

```php
define('SMTP_HOST', 'your_smtp_host');
define('SMTP_USER', 'your_smtp_user');
define('SMTP_PASS', 'your_smtp_password');
define('SMTP_PORT', '587');
```

## Forms Configuration

Two email addresses are used for form submissions:
- Contact Form: contact@ecodroids.com
- Quote Form: quote@ecodroids.com

## Page Generation

The website includes automatic generation of:
- Location-based service pages for all states and districts
- XML sitemaps for all pages
- SEO-optimized URLs

To regenerate pages and sitemaps:
```bash
php includes/generate-location-pages.php
php includes/generate-sitemap.php
```

## Form Features

Both contact and quote forms include:
- CSRF protection
- Input validation
- File upload support (Quote form)
- Auto-reply emails
- Error logging

## SEO Implementation

- Schema markup for all pages
- Location-based meta tags
- XML sitemaps
- Clean URLs (no .php extension)
- Breadcrumb navigation
- Mobile optimization

## Security Features

- CSRF token protection
- Input sanitization
- File upload restrictions
- Secure email handling
- Error logging
- XSS prevention

## File Upload Settings

Quote form allows file uploads with these restrictions:
- Maximum file size: 5MB
- Allowed formats: PDF, DOC, DOCX, JPG, PNG
- Files stored in: assets/uploads/

## Location Structure

Pages are organized hierarchically:
- State level: /locations/[state]
- District level: /locations/[state]/[district]
- Service pages: /locations/[state]/[district]/[service]

## Service Pages

Each service page includes:
- Service description
- Features and benefits
- Pricing packages
- Location-specific content
- Call-to-action buttons
- Schema markup

## Maintenance Tasks

Regular maintenance should include:
1. Updating service information in `includes/config.php`
2. Adding new locations in `locations/data/`
3. Monitoring error logs in `logs/`
4. Updating sitemaps
5. Checking form submissions
6. Reviewing email configurations

## Support

For technical support:
- Email: contact@ecodroids.com
- Quote requests: quote@ecodroids.com

## Development

To modify or extend the website:
1. Update service configurations in `includes/config.php`
2. Add new locations in `locations/data/`
3. Create new service templates in `services/`
4. Regenerate pages and sitemaps
5. Test forms and email functionality
6. Verify mobile responsiveness
7. Check SEO implementation

## Production Deployment

Before deploying to production:
1. Update SMTP settings
2. Configure proper email addresses
3. Set up proper file permissions
4. Enable error logging
5. Configure SSL certificate
6. Update base URL in config
7. Test all forms and uploads
8. Verify SEO implementation

## License

All rights reserved. This website is proprietary to EcoDroids.

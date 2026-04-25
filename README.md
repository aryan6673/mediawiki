# MediaWiki Deployment on Render

This repository contains everything needed to deploy a generic MediaWiki instance on Render for free.

## Files Included

- **Dockerfile** - Container image for MediaWiki with Apache
- **docker-compose.yml** - Local development setup
- **LocalSettings.php** - MediaWiki configuration file
- **render.yaml** - Render deployment configuration

## Quick Start

### Local Testing (Docker)
```bash
docker-compose up
```
Visit `http://localhost` to access your wiki.

### Deploy to Render
1. Push this repo to GitHub
2. Go to [Render.com](https://render.com)
3. Create new Web Service
4. Connect this repository
5. Follow the deployment wizard
6. Your wiki will be live!

## Configuration

Edit `LocalSettings.php` to customize:
- Site name
- Database settings
- Upload directory
- Language
- Extensions (later)

## Next Steps

After deployment, you can:
- Add MediaWiki extensions
- Customize the theme
- Set up user permissions
- Add company-specific content

For more info, visit [MediaWiki.org](https://www.mediawiki.org)

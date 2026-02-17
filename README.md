# Sethluck Clinical Management System

Web-based clinical management system developed for Sethluck Medical Center.  
It digitizes patient records, appointments, prescriptions, billing, and pharmacy inventory.

## Project Overview

This system has two main parts:

1. **Internal Users (`sethluck/`)**  
   - Used by doctors, nurses, pharmacists, and admin staff.  
   - Built with Laravel backend.  
   - Features:
     - Manage patient records
     - Schedule appointments
     - Handle prescriptions
     - Track billing and invoices
     - Manage drug inventory
   - Includes Blade views for internal dashboards and management interfaces.

2. **End Users / Customers (`sethluckweb/`)**  
   - Frontend for patients and visitors.  
   - Features:
     - Book appointments
     - View available doctors and services
     - Check prescription status
     - Access basic health info (if implemented)

## Folder Structure
- `sethluck/` – Backend for **internal users** (doctors, nurses, pharmacists)
  - Laravel project with controllers, models, migrations
  - Blade views for internal dashboards and management interfaces
- `sethluckweb/` – Frontend for **end users/customers**
  - Customer-facing pages (HTML/CSS/JS or Laravel Blade)

### Prerequisites
- PHP >= 8.x  
- Composer  
- MySQL / MariaDB  
- Node.js & npm (for frontend build, optional)  
- Git  


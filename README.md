
# 🏥 Basic Health Information System

This project simulates a simple health information system to manage clients and their enrollment in various health programs.

## ✨ Features
- Add health programs (HIV, TB, etc.)
- Register clients
- Enroll clients in multiple programs
- Search for clients by name
- View client profiles
- API endpoint to expose client profiles
- Simple API security using an API key

## 🛠 Tech Stack
- PHP
- MySQL
- HTML/CSS
- JavaScript

## 📦 Folder Structure
```
health-system/
├── db.php
├── add_program.php
├── save_program.php
├── add_client.php
├── save_client.php
├── enroll_client.php
├── save_enrollment.php
├── search_client.php
├── view_client.php
├── index.php
├── enrollment_success.php
├── edit_program.php
├── delete_program.php
├── view_programs.php
└── api/
    └── client_profile.php
```

## 🔐 API Usage
**Endpoint**: `/api/client_profile.php`

### Example
```
GET /api/client_profile.php?id=1&api_key=your_api_key
```

### Response
```json
{
  "status": "success",
  "client": {
    "id": 1,
    "full_name": "Jane Doe",
    "age": 28,
    "gender": "Female",
    "contact": "0700123456",
    "enrolled_programs": ["HIV", "TB"]
  }
}
```

## 📝 Installation Instructions
1. Clone this repo:
   ```bash
   git clone https://github.com/your-username/health-system.git
   ```

2. Create a database and import `schema.sql`:
   ```bash
   mysql -u root -p health_system < schema.sql
   ```

3. Edit `db.php` and configure your database connection:
   ```php
   $pdo = new PDO("mysql:host=localhost;dbname=health_system", "root", "");
   ```

4. Run with XAMPP, LAMP, or WAMP server.


## 🚀 How to Deploy (Using InfinityFree)

1. Sign up at [https://infinityfree.net](https://infinityfree.net) and create a hosting account.  
2. Access your control panel and go to **File Manager** or use **FTP** (FileZilla).  
3. Upload all project files (including the `api/` and `backend/` folders) to the `htdocs/` directory.  
4. Go to **MySQL Databases** in the control panel and create a database.  
5. Open the `backend/db.php` file and update:

```php
$host = 'sqlXXX.epizy.com';  // from your control panel
$db   = 'epiz_XXXXXXXX';     // your new database name
$user = 'epiz_XXXXXXXX';     // same as DB name
$pass = 'your-db-password';  // from control panel

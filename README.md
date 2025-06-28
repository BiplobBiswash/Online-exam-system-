# 📝 Online Exam System in PHP

A simple and secure **online examination platform** built with **PHP**, **MySQL**, and **Bootstrap**, including features like login system, timer, auto grading, PDF result generation, and admin question management.

---

## 🚀 Features

- 🔐 User Login System (Student)
- ⏱️ Timed Exam (5 minutes)
- 🎯 Randomized MCQ Questions
- 📊 Instant Auto Grading
- 🧾 PDF Download of Result (using FPDF)
- 🧑‍💼 Admin Panel to Add New Questions
- 📁 MySQL Database with Sample Data
- 🎨 Clean Bootstrap UI

---

## 🗂️ File Structure

```
📁 online_exam_system
 ├── db.php                 # Database connection
 ├── login.php              # Student login page
 ├── login_check.php        # Login validation
 ├── exam.php               # Exam interface with timer
 ├── submit_exam.php        # Calculates and stores results
 ├── result_pdf.php         # Generate PDF of exam result
 ├── admin_add_question.php # Admin adds MCQs here
 ├── create_tables.sql      # MySQL schema and demo data
 └── fpdf/                  # Contains FPDF library
```

---

## 🛠️ Setup Instructions

### 1. Clone or Download the Project

```bash
git clone https://github.com/your-username/online-exam-system.git
cd online-exam-system
```

### 2. Import the Database

- Use `create_tables.sql` in phpMyAdmin or MySQL CLI:
```sql
SOURCE create_tables.sql;
```

### 3. Configure Database

Edit `db.php` with your actual database credentials:
```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "exam_system";
```

### 4. Install FPDF

Download the real [FPDF library](http://fpdf.org/en/download.php)  
and place `fpdf.php` inside the `/fpdf` folder.

---

## 👥 Default Credentials

| Role     | Username | Password |
|----------|----------|----------|
| Student  | student  | 1234     |

> You can later extend this to allow teacher/admin login.

---

## 🧾 PDF Generation

After completing the exam, users can download their result as a PDF using:
```
result_pdf.php
```

---

## 📄 License

This project is licensed under the **MIT License** and is free for personal or educational use.

---

## 🤝 Contributing

Pull requests and improvements are welcome. For major changes, open an issue first.

---

## 🌐 Live Demo (Optional)

> Add your live demo URL here (e.g., from 000WebHost)

---

## 🔖 Tags

`#php` `#online-exam` `#student-management` `#bootstrap` `#pdf-report` `#mysql` `#fpdf`
# Employee Management System

## Description

Employee Management System is a PHP and MySQL based web application used to manage employee information.

The system allows an administrator to securely log in and perform employee management operations such as adding, viewing, searching, editing and deleting employee records.

## Features

- Admin Login
- Session Management
- Change Password
- Add Employee
- View Employees
- Search Employees
- Edit Employee
- Delete Employee
- Employee Dashboard
- Department-wise Employee Count
- Form Validation
- MySQL Database Connectivity

## Technologies Used

- PHP
- MySQL
- HTML
- CSS
- XAMPP
- phpMyAdmin
- Git
- GitHub

## Database

Database Name:

employee_management

Main Tables:

- employees
- admin

## Employee Details

The employee table stores:

- Employee ID
- Name
- Email
- Phone
- Gender
- Date of Birth
- Department
- Designation
- Salary
- Joining Date
- Address

## System Workflow

1. Admin opens the login page.
2. Admin enters username and password.
3. System verifies the credentials using MySQL.
4. Successful login redirects to the dashboard.
5. Admin can view employee statistics.
6. Admin can add new employees.
7. Admin can search employees.
8. Admin can edit employee information.
9. Admin can delete employee records.
10. Admin can change the admin password.
11. Admin can log out securely.

## Project Structure

```text
Employeemanagementsystem/
│
├── login.php
├── logout.php
├── dashboard.php
├── employees.php
├── add_employee.php
├── edit_employee.php
├── delete_employee.php
├── change_password.php
├── db.php
├── test_db.php
├── style.css
└── README.md
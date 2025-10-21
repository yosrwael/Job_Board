# 💼 Laravel Job Board Platform

##  Overview
The **Laravel Job Board** project is a web-based application that connects **employers** and **candidates** in an easy-to-use platform. Employers can post and manage job listings, while candidates can search, apply, and track job opportunities. Administrators oversee the platform by approving job posts and monitoring activities.

---

##  Key Features

###  Employers
- Register and manage an account.  
- Create and post detailed job listings (title, description, qualifications, salary, etc.).  
- Edit or delete job postings.  
- Review applications and accept/reject candidates.  
- Upload company logo or branding.  

###  Candidates
- Register and manage a personal account.  
- Create and update their profile and resume.  
- Search and filter jobs using:
  - Keywords  
  - Location  
  - Category / Industry  
  - Salary Range  
  - Experience Level  
  - Date Posted  
- Apply directly on the platform or contact employers.  
- Manage applications (cancel, view status).  
- Receive notifications about job updates (optional feature).  

###  Administrators
- Approve or reject job postings submitted by employers.  
- Monitor user activities and platform statistics.  
- Manage reported jobs or users.  

---

##  Job Listing Management
Each job listing includes:
- Job Title  
- Description and Responsibilities  
- Required Skills and Qualifications  
- Salary Range and Benefits  
- Job Type (Remote, On-site, Hybrid)  
- Location  
- Application Deadline  
- Company Logo / Branding  

---

##  Application Process
Candidates can apply for jobs in multiple ways:
1. Uploading their resume directly to the system.  
2. Providing contact details (email or phone).  
3. Filling out a custom in-app form (bonus).  

Employers can then:
- View candidate applications.
- Contact candidates directly through email or in-app messages.
- Accept or reject applications.

---

##  Job Search & Filtering
Candidates can easily find jobs using:
-  Keyword-based search (title or description)
-  Location filter
-  Category / Industry filter
-  Salary range



## Tech Stack

| Category | Technology |
|-----------|-------------|
| Backend | Laravel 10+ |
| Frontend | Blade Templates / Tailwind CSS |
| Database | MySQL  |
| Authentication | Laravel Breeze  |
| Notifications | Laravel Notifications (Database) |
| File Uploads | Laravel Storage (Public / S3) |


---

## ⚙️ Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-username/job-board.git
cd job-board

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
- Upload company logo via **Spatie Media Library**.  

###  Candidates
- Register and manage a personal account.  
- Upload resumes using **Spatie Media Library**.  
- Search and filter jobs using:
  - Keywords  
  - Location  
  - Category / Industry  
  - Salary Range  

- Apply directly on the platform.  
- Manage and cancel applications. 
- Receive notifications about job updates .  

###  Admins
- Approve or reject job postings submitted by employers.  
- Monitor user activities and platform statistics.  
- Manage jobs or users.  

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
- Company Logo 

Employers can update or remove their listings anytime.  
Admins must approve job posts before they go live.

---

##  Application Process
Candidates can apply for jobs by uploading their resume directly to the system.  
.    

Employers can then:
- View candidate applications.
- Accept or reject applications.

---

## Tech Stack

| Category | Technology |
|-----------|-------------|
| Backend | Laravel 12 |
| Frontend | Blade Templates / Tailwind CSS |
| Database | MySQL  |
| Authentication | Laravel Breeze  |
| Notifications | Laravel Notifications (Database) |
| Media Management | **Spatie Media Library** |



---

## ⚙️ Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-username/job-board.git
cd job-board

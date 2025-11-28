# View Generation Script
# This document contains templates for all remaining views
# Copy and paste each section to create the corresponding view file

## Job Vacancies Views

All job vacancy views need these fields:
- title (required)
- description (required, longText)
- requirements (required, longText)
- salary_range (optional)
- location (required)
- job_type (required, enum: full_time, part_time, contract, internship)
- company_id (required, foreign key)
- job_category_id (required, foreign key)

## Applications Views

All application views need these fields:
- job_vacansy_id (required, foreign key)
- user_id (required, foreign key)
- resume_id (required, foreign key)
- status (required, enum: pending, reviewed, accepted, rejected)

## Users Views

All user views need these fields:
- name (required)
- email (required, unique)
- password (required on create, optional on update)
- role (required, enum: admin, company_owner, job_seeker)

## Resumes Views

All resume views need these fields:
- user_id (required, foreign key)
- resume_content (required, longText)
- skills (optional, text)
- experience (optional, text)

## Pattern to Follow:

1. **Index View**: List all items in a table or grid
2. **Create View**: Form with all required fields
3. **Edit View**: Same as create but pre-filled
4. **Show View**: Display all details and relationships

## Quick Creation Commands:

You can create placeholder views using:
```bash
# For each controller, create 4 views
touch resources/views/job-vacancies/{index,create,edit,show}.blade.php
touch resources/views/applications/{index,create,edit,show}.blade.php
touch resources/views/users/{index,create,edit,show}.blade.php
touch resources/views/resumes/{index,create,edit,show}.blade.php
```

Then copy the pattern from companies or categories views and adjust the fields.

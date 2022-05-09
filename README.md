DESCRIPTION

Project is build on Laravel framework (on docker)

Project index page http://localhost/projects

1. New Project can be created at index page by pressing "Create new project" button.
2. Project name, groups, and students per group are mandatory input fields to create a project.
3. At index page there is a list of all projects with pagination, latest records first.
4. Created project can be opened by pressing "OPEN" button.
5. In project show page can be added new student to current project by pressing "Add new student" button.
6. Student name must be unique for all projects. If entered name that already exist, alert message is received with stated project link where student already added.
7. Student name is mandatory field, select field "Group" is optional field.
8. Student could be added to Students database by clicking button "Add student".
9. There is hidden input with project id.
10. Added student to students database is visible on current project only if project id match with student project_id.
11. Student group in the project can be changed by clicking "Change group" button.
12. Student can not be added to the group if group reached limit of members.
13. Student can be removed from the project and database by clicking "Delete" button.
14. Students already dedicated to the groups are visible in the project groups section.
15. All actions status are stated in alerts and errors messages.

There are two databases:
1. Projects
+-------------------------------------------------------------------------+
| id | project_name | groups | persons_in_group | created_at | updated_at |
+-------------------------------------------------------------------------+

2. Students
+----------------------------------------------------------------------------+
| id | name (unique)| group | project_id (foreign) | created_at | updated_at |
+----------------------------------------------------------------------------+

There are created migrations files
project-app\database\migrations\2022_05_06_071129_create_projects_table.php
project-app\database\migrations\2022_05_06_071816_create_students_table.php

Project databases can be added to databse by command:
- php artisan migrate
check env.example file before.

There are created two controllers for routing data:
ProjectController.php
StudentController.php

# Laravel API for Student Management

This Laravel API provides functionality for managing students, groups, and lectures. The system includes students, groups, and lectures, with relationships defined as follows:

- Each student has a unique name and email.
- Each group has a unique name.
- Each lecture has a unique topic and a description.

## API Endpoints

### Students

1. **Get All Students**
    - Endpoint: `GET /api/students`
    - Returns a list of all students.

2. **Get Student Information**
    - Endpoint: `GET /api/students/{student_id}`
    - Returns information about a specific student, including name, email, associated class, and attended lectures.

3. **Create Student**
    - Endpoint: `POST /api/students`
    - Request Body:
      ```json
      {
        "name": "John Doe",
        "email": "john.doe@example.com",
        "group_id": 1
      }
      ```
    - Creates a new student.

4. **Update Student**
    - Endpoint: `PATCH /api/students/{student_id}`
    - Request Body:
      ```json
      {
        "name": "Updated Name",
        "group_id": 2
      }
      ```
    - Updates student information, including name and associated group.

5. **Delete Student**
    - Endpoint: `DELETE /api/students/{student_id}`
    - Deletes a student. If the student is associated with a group, they are detached but not completely removed from the system.

### Groups

6. **Get All Groups**
    - Endpoint: `GET /api/groups`
    - Returns a list of all groups.

7. **Get Group Information**
    - Endpoint: `GET /api/groups/{group_id}`
    - Returns information about a specific group, including name and list of students.

8. **Get Group Study Plan**
    - Endpoint: `GET /api/groups/{group_id}/schedule`
    - Returns the schedule (list of lectures) for a specific group.

9. **Create/Update Group schedule**
    - Endpoint: `POST /api/groups/{group_id}/study-plan`
    - Request Body:
      ```json
      [
        {
            "lecture_id": 10,
            "lecture_order": 5
        },
        {
            "lecture_id": 13,
            "lecture_order": 6
        }
      ]
      ```
    - Creates or updates the study plan for a group.

10. **Create Group**
    - Endpoint: `POST /api/groups`
    - Request Body:
      ```json
      {
        "name": "Group A"
      }
      ```
    - Creates a new group.

11. **Update Group**
    - Endpoint: `PUT /api/groups/{group_id}`
    - Request Body:
      ```json
      {
        "name": "Updated Group Name"
      }
      ```
    - Updates group information, including name.

12. **Delete Group**
    - Endpoint: `DELETE /api/groups/{group_id}`
    - Deletes a group. Students associated with the group are detached but not completely removed from the system.

### Lectures

13. **Get All Lectures**
    - Endpoint: `GET /api/lectures`
    - Returns a list of all lectures.

14. **Get Lecture Information**
    - Endpoint: `GET /api/lectures/{lecture_id}`
    - Returns information about a specific lecture, including topic, description, associated groups, and attended students.

15. **Create Lecture**
    - Endpoint: `POST /api/lectures`
    - Request Body:
      ```json
      {
        "name": "Topic A",
        "description": "Description of Topic A"
      }
      ```
    - Creates a new lecture.

16. **Update Lecture**
    - Endpoint: `PUT /api/lectures/{lecture_id}`
    - Request Body:
      ```json
      {
        "name": "Updated Topic",
        "description": "Updated Description"
      }
      ```
    - Updates lecture information, including topic and description.

17. **Delete Lecture**
    - Endpoint: `DELETE /api/lectures/{lecture_id}`
    - Deletes a lecture.

## Technical Requirements

1. **Strict Typing**: Use strict typing throughout the application.
2. **Controller Logic**: Keep controllers free of business logic. They should validate requests, call model or service methods, handle exceptions, and return JSON responses.
3. **Service Layer**: Implement a service layer for complex business logic.
4. **JSON Responses**: Return results in JSON format.
5. **Validation**: Implement request validation using Laravel request groups.
6. **Dependency Injection**: Utilize dependency injection in controllers and services.
7. **Optimal Queries**: Optimize queries by using eager loading for related data.

## Deployment with Laravel Sail

This project can be easily deployed using Laravel Sail, a lightweight Docker development environment.

### Prerequisites

- Install Docker: [Docker Installation Guide](https://docs.docker.com/get-docker/)
- Install laravel and packages:
  ```bash
  composer install
  ```
- Configure the database connection in the .env file and create bcrypt key.
  ```bash
  composer run post-autoload-dump
  composer run post-create-project-cmd
  composer run post-root-package-install
  composer run post-update-cmd
  ```
- Build, up docker container and migrate tables
  ```bash
  ./vendor/bin/sail build
  ./vendor/bin/sail up -d
  ./vendor/bin/sail migrate
  ```
- Not necessarily, you can run the seeder
  ```bash
  ./vendor/bin/sail migrate --seed
  ```

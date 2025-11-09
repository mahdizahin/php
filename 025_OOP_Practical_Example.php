<?php
/*

Goal:
Demonstrate PHP OOP in a simple course management system
using Classes, Inheritance, Traits, Polymorphism, Static
properties, Constants, and Encapsulation.
*/

// TRAIT — Reusable behavior
trait Logger {
    // Log messages with a prefix
    public function log($message) {
        echo "[LOG] " . $message . "\n";
    }
}

/*
Explanation:
- Traits allow us to reuse methods across multiple classes.
- Here, Logger provides a reusable log() method.
- Any class using this trait can log messages without rewriting code.
*/


// BASE CLASS — User
class User {
    protected $name;
    protected $email;

    public function __construct($name, $email) {
        $this->name  = $name;
        $this->email = $email;
    }

    public function getDetails() {
        return "{$this->name} ({$this->email})";
    }
}

/*
Explanation:
- User is the parent class for both Students and Instructors.
- $name and $email are protected → accessible in child classes.
- getDetails() returns a simple description of the user.
*/


// INHERITANCE + POLYMORPHISM
class Student extends User {
    use Logger;  // Students can log actions

    public $courses = []; // Courses enrolled

    public function enroll($course) {
        $this->courses[] = $course;
        $this->log("{$this->name} enrolled in {$course->getTitle()}");
    }

    public function showCourses() {
        echo "Courses for {$this->name}:\n";
        foreach ($this->courses as $course) {
            echo "- " . $course->getTitle() . "\n";
        }
    }
}

/*
Explanation:
- Student inherits from User → has name and email.
- Uses Logger trait → can log actions.
- enroll() adds a course and logs it.
- showCourses() displays all enrolled courses.
*/

class Instructor extends User {
    use Logger; // Instructors can log actions

    private $salary; // Private property → only accessible within class

    public function __construct($name, $email, $salary) {
        parent::__construct($name, $email); // Reuse User constructor
        $this->salary = $salary;
    }

    public function teach($course) {
        $this->log("{$this->name} is teaching {$course->getTitle()}");
    }

    public function getSalary() {
        return $this->salary;
    }
}

/*
Explanation:
- Instructor inherits from User → has name and email.
- teach() logs teaching a course.
- getSalary() safely exposes private salary property.
*/


// STATIC PROPERTIES & CONSTANTS
class Course {
    private $title;
    private $instructor;
    public static $courseCount = 0; // Static: shared by all instances
    const PLATFORM_NAME = "NeoLearn"; // Constant: cannot change
    public function __construct($title, Instructor $instructor) {
        $this->title = $title;
        $this->instructor = $instructor;
        self::$courseCount++; // Increment total courses
    }

    public function getTitle() {
        return $this->title;
    }

    public function getInstructor() {
        return $this->instructor->getDetails();
    }

    public static function getTotalCourses() {
        return self::$courseCount;
    }
}

/*
Explanation:
- $courseCount is static → shared across all Course objects.
- PLATFORM_NAME is constant → same for all courses.
- getTotalCourses() shows how many courses have been created.
*/


// REAL EXECUTION FLOW

// Create an instructor
$instructor = new Instructor("Alice", "alice@example.com", 5000);
/*
Output: nothing yet, instructor object created.
Explanation: Object now has name, email, salary, and Logger trait.
*/

// Create a student
$student = new Student("Bob", "bob@example.com");
/*
Output: nothing yet, student object created.
Explanation: Student has name, email, Logger trait, and empty courses array.
*/

// Create courses
$course1 = new Course("PHP for Beginners", $instructor);
$course2 = new Course("Advanced OOP in PHP", $instructor);
/*
Output: nothing yet.
Explanation:
- Static $courseCount increments automatically for each new course.
- Each course has title and instructor reference.
*/

// Instructor teaches a course
$instructor->teach($course1);
/*
Output:
[LOG] Alice is teaching PHP for Beginners
Explanation: Logger trait is used to print log.
*/

// Student enrolls in courses
$student->enroll($course1);
$student->enroll($course2);
/*
Output:
[LOG] Bob enrolled in PHP for Beginners
[LOG] Bob enrolled in Advanced OOP in PHP
Explanation:
- enroll() method adds courses to student and logs it.
- Demonstrates polymorphism: log() works in both Student and Instructor.
*/

// Display student's courses
echo "\n";
$student->showCourses();
/*
Output:
Courses for Bob:
- PHP for Beginners
- Advanced OOP in PHP
Explanation:
- Iterates through $courses array and prints titles.
- Encapsulation: courses array is public here for simplicity.
*/

// Display instructor info
echo "\n";
echo "Instructor: " . $instructor->getDetails() . "\n";
echo "Salary: $" . $instructor->getSalary() . "\n";
/*
Output:
Instructor: Alice (alice@example.com)
Salary: $5000
Explanation:
- getDetails() inherited from User.
- getSalary() shows private property safely.
*/

// Display total courses and platform
echo "\n";
echo "Total Courses Created: " . Course::getTotalCourses() . "\n";
echo "Platform: " . Course::PLATFORM_NAME . "\n";
/*
Output:
Total Courses Created: 2
Platform: NeoLearn
Explanation:
- Static property shows total number of courses.
- Constant PLATFORM_NAME is same for all instances.
*/


/*
1. Classes & Inheritance:
   - User → Student, Instructor
2. Traits:
   - Logger used to print logs in multiple classes
3. Polymorphism:
   - log() behaves similarly in different classes
4. Static Properties:
   - Course::$courseCount keeps track of total courses
5. Constants:
   - Course::PLATFORM_NAME is fixed
6. Encapsulation:
   - Private salary property, accessed via method
7. Practical Output:
   - Demonstrates all OOP concepts working together
*/
?>
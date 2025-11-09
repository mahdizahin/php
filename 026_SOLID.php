<?php
/*

SOLID is a set of 5 key rules that help you write clean,
maintainable, and flexible Object-Oriented PHP code.

S - Single Responsibility Principle
O - Open/Closed Principle
L - Liskov Substitution Principle
I - Interface Segregation Principle
D - Dependency Inversion Principle

*/

// SINGLE RESPONSIBILITY PRINCIPLE (SRP)
// ======================================================
// → Each class should have only one reason to change.
// Example: Separate Employee data handling and Salary calculation.

class Employee {
    public $name;     // Employee's name
    public $position; // Employee's job title

    public function __construct($name, $position) {
        $this->name = $name;       
        $this->position = $position; 
    }
}

// Wrong way: Mixing multiple responsibilities (data + salary logic) in one class.
// Correct way: SalaryCalculator handles only salary calculation.

class SalaryCalculator {
    // Only calculates salary based on position
    public function calculateSalary($position) {
        if ($position == "Manager") return 60000;
        if ($position == "Developer") return 45000;
        if ($position == "Intern") return 20000;
        return 30000; // Default salary
    }
}

// Example usage:
$emp1 = new Employee("Rahim", "Developer"); // Create employee object
$salaryCalc = new SalaryCalculator();       // Create salary calculator object
echo "SRP Example: {$emp1->name}'s salary is " . $salaryCalc->calculateSalary($emp1->position) . " BDT\n";
// Output: Rahim's salary is 45000 BDT
         
/*
Explanation:
- Employee class = stores employee info only.
- SalaryCalculator = calculates salary only.
- If salary rules change, you only change SalaryCalculator, not Employee class.
- One class = one job → easier to maintain.     
*/


// OPEN/CLOSED PRINCIPLE (OCP)
// ======================================================
// → Classes should be open for extension but closed for modification.
// Example: Add new salary types without changing old code.

interface BonusCalculator {
    public function calculateBonus($salary); // Any bonus calculator must have this method
}

class FixedBonus implements BonusCalculator {
    public function calculateBonus($salary) {
        return 5000; // Fixed bonus amount
    }
}

class PercentageBonus implements BonusCalculator {
    public function calculateBonus($salary) {
        return $salary * 0.10; // 10% of salary
    }
}

// Use existing bonus calculation without changing old code
$salary = 45000;
$bonusType = new PercentageBonus();  // Create a bonus strategy
echo "OCP Example: Bonus = " . $bonusType->calculateBonus($salary) . " BDT\n";
// Output: Bonus = 4500 BDT

/*
Explanation:
- Old classes (FixedBonus) are not changed.
- New bonuses (PercentageBonus) can be added easily.
- You extend the system without modifying existing code → safer and less bug-prone.
*/


// LISKOV SUBSTITUTION PRINCIPLE (LSP)
// ======================================================
// → Subclasses should be replaceable for their parent class without breaking the program.

class BaseEmployee {
    public function getWorkHours() {
        return 8; // Default 8 hours
    }
}

class FullTimeEmployee extends BaseEmployee {
    public function getWorkHours() {
        return 8; // Full-time employee works 8 hours
    }
}

class PartTimeEmployee extends BaseEmployee {
    public function getWorkHours() {
        return 4; // Part-time employee works 4 hours
    }
}

function showWorkHours(BaseEmployee $employee) {
    // Accepts any employee object (full-time or part-time)
    echo "LSP Example: This employee works {$employee->getWorkHours()} hours/day\n";
}

showWorkHours(new FullTimeEmployee());
showWorkHours(new PartTimeEmployee());
// Output:
// This employee works 8 hours/day
// This employee works 4 hours/day

/*
Explanation:
- Function expects a BaseEmployee → can pass any subclass (FullTime, PartTime).
- Program doesn’t break.
- Subclasses should behave like parent → interchangeable.
*/


// INTERFACE SEGREGATION PRINCIPLE (ISP)
// ======================================================
// → Don’t force a class to implement methods it doesn’t need.

interface Workable {
    public function work(); // Everyone should be able to work
}

interface Codeable {
    public function code(); // Only coders implement this
}

interface MeetingAttendable {
    public function attendMeeting(); // Only managers implement this
}

class Developer implements Workable, Codeable {
    public function work() { echo "ISP Example: Developer working...\n"; }
    public function code() { echo "ISP Example: Writing code...\n"; }
}

class Manager implements Workable, MeetingAttendable {
    public function work() { echo "ISP Example: Manager working...\n"; }
    public function attendMeeting() { echo "ISP Example: Attending meetings...\n"; }
}

$dev = new Developer();
$dev->work();  // Developer working...
$dev->code();  // Writing code...

$mgr = new Manager();
$mgr->work();          // Manager working...
$mgr->attendMeeting(); // Attending meetings...

/*
Explanation:
- Developer doesn’t need attendMeeting → we don’t force it.
- Manager doesn’t need code → we don’t force it.
- Each class implements only what it actually needs.
*/


// DEPENDENCY INVERSION PRINCIPLE (DIP)
// ======================================================
// → High-level modules should not depend on low-level modules.
//   Both should depend on abstractions (interfaces).

interface OutputInterface {
    public function generate($data); // Any output format must implement generate()
}

class PDFOutput implements OutputInterface {
    public function generate($data) {
        echo "DIP Example: Generating PDF report for $data\n";
    }
}

class CSVOutput implements OutputInterface {
    public function generate($data) {
        echo "DIP Example: Generating CSV report for $data\n";
    }
}

class ReportGenerator {
    private $output;

    public function __construct(OutputInterface $output) {
        $this->output = $output; // Accepts any OutputInterface object
    }

    public function createReport($data) {
        $this->output->generate($data); // Generate report using provided output
    }
}

$report1 = new ReportGenerator(new PDFOutput());
$report1->createReport("Employee Data"); // Generating PDF report for Employee Data

$report2 = new ReportGenerator(new CSVOutput());
$report2->createReport("Employee Data"); // Generating CSV report for Employee Data

/*
Explanation:
- ReportGenerator doesn’t care about PDF or CSV.
- It only cares about OutputInterface → abstraction.
- We can add new formats later (Excel, JSON) without changing ReportGenerator.
*/


/*

S → Single Responsibility:→ One class = One job.
Example: Employee class stores employee info only. SalaryCalculator calculates salary. One class = one responsibility.
Example: Order class stores order details only. InvoiceGenerator calculates bills. Each class has a single job.

O → Open/Closed:→ Add new features without changing old code.
Example: You can add a new PerformanceBonus class without touching existing FixedBonus or PercentageBonus.
Example: You can add a new DiscountCoupon class without changing existing SeasonalDiscount or MembershipDiscount classes.

L → Liskov Substitution:→ Subclasses should work like their parent.
Example: FullTimeEmployee and PartTimeEmployee can be used wherever a BaseEmployee is expected, like calculating work hours.
Example: DineInCustomer and TakeAwayCustomer can be used wherever a Customer object is expected, like for calculating total order cost.

I → Interface Segregation:→ Don’t force unnecessary functions.
Example: Developers implement code() but not attendMeeting(). Managers implement attendMeeting() but not code().
Example: Cook implements prepareFood(). Cashier implements processPayment(). They don’t have to implement methods they don’t use.

D → Dependency Inversion:→ Depend on interfaces, not concrete classes.
Example: ReportGenerator works with any output type (PDFOutput, CSVOutput) because it depends on OutputInterface, not a specific class.
Example: ReceiptPrinter works with any printer type (LaserPrinter, ThermalPrinter) because it depends on PrinterInterface, not a specific printer class.

*/
?>
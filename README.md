🧠 What is OOP in PHP?

OOP (Object-Oriented Programming) organizes code into classes and objects rather than functions and procedures.
It helps in:

Reusability

Maintainability

Encapsulation (data protection)

Real-world modeling

## 🔹 1. Class and Object

A **class** is a blueprint for creating objects.  
An **object** is an instance of a class.

```php
<?php
class Car {
    public $brand;
    public $color;

    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
    }

    public function display() {
        echo "Brand: {$this->brand}, Color: {$this->color}";
    }
}

$car1 = new Car("BMW", "Black");
$car1->display();
?>
```

## 🔹 2. Properties and Methods

- **Properties** → Variables inside a class  
- **Methods** → Functions inside a class  

```php
<?php
class Student {
    public $name;
    public $age;

    function setData($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    function showData() {
        echo "Name: $this->name, Age: $this->age";
    }
}

$student1 = new Student();
$student1->setData("Kunal", 22);
$student1->showData();
?>

```

## 🔹 3. Constructor and Destructor

- **Constructor (`__construct()`)** → Called automatically when an object is created  
- **Destructor (`__destruct()`)** → Called automatically when an object is destroyed  

```php
<?php
class Person {
    function __construct() {
        echo "Object created<br>";
    }

    function __destruct() {
        echo "Object destroyed";
    }
}

$p = new Person();
?>

```

## 🔹 4. Access Modifiers

| **Modifier** | **Access Within Class** | **Inherited Class** | **Outside Class** |
|--------------|--------------------------|----------------------|--------------------|
| `public`     | ✅                       | ✅                   | ✅                 |
| `protected`  | ✅                       | ✅                   | ❌                 |
| `private`    | ✅                       | ❌                   | ❌                 |

```php
<?php
class Example {
    public $a = "Public";
    protected $b = "Protected";
    private $c = "Private";

    function show() {
        echo $this->a;
        echo $this->b;
        echo $this->c;
    }
}

$ex = new Example();

echo $ex->a; // Works
// echo $ex->b; // Error
// echo $ex->c; // Error
$ex->show(); // Works
?>
```

## 🔹 5. Accessing Properties in an Inherited (Child) Class

**Concept:**  
In PHP, a child class **inherits public and protected properties/methods** from its parent class.  
Private properties/methods are **not inherited** and cannot be accessed directly by the child class.

**Example (PHP):**
```php
<?php
class ParentClass {
    public $x = "Public";
    protected $y = "Protected";
    private $z = "Private";

    function showParent() {
        echo $this->x; // ✅ Public accessible inside parent
        echo $this->y; // ✅ Protected accessible inside parent
        echo $this->z; // ✅ Private accessible inside parent
    }
}

class ChildClass extends ParentClass {
    function showChild() {
        echo $this->x; // ✅ Works (public)
        echo $this->y; // ✅ Works (protected)
        // echo $this->z; // ❌ Error (private not inherited)
    }
}

$child = new ChildClass();
$child->showChild();  // Works for public and protected
// echo $child->y; // ❌ Error (protected can't be accessed outside)
?>
```

## 🔹 6. Inheritance (Advanced Example)

**Concept:**  
Inheritance allows a class to reuse properties and methods from another class (parent).  
This example shows **method overriding**, **access modifiers**, and **calling parent methods**.

```php
<?php
class ParentClass {
    public $name = "ParentClass";
    protected $protectedVar = "Protected Variable";
    private $privateVar = "Private Variable";

    public function greet() {
        echo "Hello from Parent<br>";
    }

    protected function showProtected() {
        echo "Protected in Parent: $this->protectedVar<br>";
    }

    private function showPrivate() {
        echo "Private in Parent: $this->privateVar<br>";
    }
}

class ChildClass extends ParentClass {
    public $name = "ChildClass"; // overrides parent property

    // Overriding parent method
    public function greet() {
        echo "Hello from Child<br>";
        parent::greet(); // calling parent method
    }

    public function showDetails() {
        echo "Name: $this->name<br>";
        
        // Accessing protected property and method from parent
        echo "Protected Var: $this->protectedVar<br>";
        $this->showProtected();

        // Private property/method cannot be accessed
        // echo $this->privateVar; // ❌ Error
        // $this->showPrivate();   // ❌ Error
    }
}

$child = new ChildClass();
$child->greet();       // Calls child method, then parent method
$child->showDetails(); // Shows protected and overridden property
?>

```
## 🔹 7. Overriding Methods

**Concept:**  
A child class can **override a method** from the parent class.  
You can still access the parent method using `parent::methodName()`.

**Example (PHP):**
```php
<?php
class A {
    public function display() {
        echo "This is class A method";
    }
}

class B extends A { // class B inherits class A
    public function display() { // overriding parent class method
        echo "This is class B method<br>";
        parent::display(); // call parent method as well
    }
}

$obj = new B();
$obj->display(); // calling overridden method
?>
```

## 🔹 8. `parent::` and `self::` Keywords

**Concepts:**

- `parent::` → Used to **access parent class methods or properties**, even if they are overridden in the child class.  
- `self::` → Used to **access static properties or methods** within the **same class**.  

These keywords are important when working with **inheritance** and **static members**, to clearly specify **which class’s method/property** you want to access.

---

### 1️⃣ Using `parent::`

**Why:**  
- When a child class overrides a parent method, you may still want to **call the original parent method**.  

**Example:**

```php
<?php
class A {
    public function say() {
        echo "Hello from A";
    }
}

class B extends A {
    public function say() {
        parent::say(); // Calls parent method
        echo " and Hello from B";
    }
}

$obj = new B();
$obj->say();
?>
```

## 2️⃣ Using `self::`

**Why:**  
- `self::` is used to access **static methods or properties** inside the **same class**.  
- Useful when you **don’t want to create an object instance**, but still need to call a method or property.  

**Example (PHP):**
```php
<?php
class Example {
    public static $value = "Static Property";

    public static function showValue() {
        echo self::$value;
    }

    public static function display() {
        self::showValue(); // Accessing static method within the same class
    }
}

Example::display();
?>
```

## 🔹 9. Static Members

**Concept:**  
- **Static properties and methods** belong to the **class itself**, not to any instance.  
- Can be accessed **without creating an object**.  
- Useful for constants, utility functions, or counters.

---

### Example 1: Basic Static Property and Method

```php
<?php
class Math {
    public static $pi = 3.14;

    public static function square($n) {
        return $n * $n;
    }
}

// Access static property
echo "Value of Pi: " . Math::$pi . "<br>";

// Access static method
echo "Square of 4: " . Math::square(4);
?>
```
### Example 2: Static Counter

**Concept:**  
- Static properties belong to the class itself, **shared across all calls**.  
- Useful for counters or tracking data without creating objects.

```php
<?php
class Counter {
    public static $count = 0;

    public static function increment() {
        self::$count++;
    }

    public static function getCount() {
        return self::$count;
    }
}

// Increment counter multiple times
Counter::increment();
Counter::increment();
Counter::increment();

// Display total count
echo "Total Count: " . Counter::getCount();
?>
```
## 🔹 10. Final Keyword

**Concepts:**

1. `final class` → **Cannot be inherited**.  
   - Prevents other classes from extending it.  
   - Useful for classes that should not be modified.

2. `final method` → **Cannot be overridden**.  
   - Useful when you want to **lock the implementation** of a method in the class hierarchy.

---

### Example 1: Final Method

```php
<?php
class Base {
    final public function test() {
        echo "This method cannot be overridden.<br>";
    }

    public function normal() {
        echo "This method can be overridden.<br>";
    }
}

class Child extends Base {
    // Trying to override final method will cause an error
    // public function test() {
    //     echo "Trying to override"; // ❌ Error
    // }

    public function normal() {
        echo "Overridden normal method.<br>";
    }
}

$obj = new Child();
$obj->test();    // Calls final method from Base
$obj->normal();  // Calls overridden method from Child
?>
```

## 🔹 11. Abstract Classes in PHP

### 🧠 Concept

An **abstract class** defines a **common structure or blueprint** for other classes.  
It may contain:
- **Abstract methods** → declared but **not implemented**.
- **Concrete methods** → fully implemented and reusable.

You **cannot create an object** of an abstract class directly.  
Child classes **must implement** all abstract methods.

---

## ✅ Example 1: Basic Abstract Class

```php
<?php
abstract class Shape {
    abstract public function area(); // Must be implemented by child class
}

class Circle extends Shape {
    private $radius;

    public function __construct($r) {
        $this->radius = $r;
    }

    public function area() {
        echo "Circle Area = " . (3.14 * $this->radius * $this->radius);
    }
}

$c = new Circle(5);
$c->area();
?>
```

###  🔹 12. PHP Constants — Explained

- A constant is a named value that cannot change once it’s defined.

#### 1️⃣ Why use constants?

- They’re used for values that stay the same throughout your program — for example:

- Application name or version

- Database configuration keys

-  Mathematical constants (PI, GRAVITY, etc.)

```php
2️⃣ How to define a constant
✅ Method 1: Using define()

Syntax:

define("APP_NAME", "MyApplication");
echo APP_NAME; // MyApplication
```


#### ⚙️ Notes:

- Constant names are usually uppercase by convention.
- They are global, accessible anywhere (even inside functions, classes, etc.).
- You can also make them case-insensitive:
```php
define("GREETING", "Hello", true); // 3rd arg true => case-insensitive (deprecated)

✅ Method 2: Using const keyword (inside or outside class)
const VERSION = '1.0.0';
echo VERSION;
```

#### ⚙️ Difference:

- const is compile-time, faster, and used inside classes too.
- define() is runtime, can only define global constants.

##### 3️⃣ Class Constants

- Defined with const inside a class or interface.

```php
class App {
    const VERSION = '2.5';
    const NAME = 'MyApp';
}

echo App::VERSION; // 2.5
```

- You access them with the scope resolution operator :: (not $this).


##### 4️⃣ Accessing Constants

- ✅ From same class:
```php
echo self::VERSION;
```

- ✅ From child class:
```php
echo parent::VERSION;
```

- ✅ From outside:
```php
echo App::VERSION;
```
### 🔹 13. PHP Traits — Complete Concept Guide
- 1️⃣ What is a Trait?
#### A Trait in PHP is a mechanism for code reuse in single inheritance languages.
- In simple terms:
- A Trait lets you share methods or properties between multiple classes without using inheritance.

- 2️⃣ Why do we need Traits?

- PHP allows only single inheritance (a class can extend only one class):
```php
class A {}
class B extends A {} // ✅ works
class C extends A, B {} // ❌ not allowed
```

- But what if you want to reuse code from multiple sources?
- 👉 Use Traits — like “mix-ins” that inject reusable methods into classes.

- 3️⃣ Defining and Using a Trait

- Syntax:

```php
trait TraitName {
    public function methodName() {
        echo "Hello from Trait!";
    }
}
```


- Using a trait in a class:
```php
class MyClass {
    use TraitName;
}

$obj = new MyClass();
$obj->methodName(); // Output: Hello from Trait!

```

#### 4️⃣ Traits Can Contain

```
✅ Methods
✅ Properties
✅ Static methods
✅ Abstract methods
```
- Example:

```php
trait Logger {
    public $logFile = 'app.log';
    public function log($msg) {
        echo "Logging: $msg";
    }
    public static function status() {
        echo "Logger active";
    }
}

```
#### 5️⃣ Multiple Traits in One Class


- You can use multiple traits separated by commas:

```php
trait A { public function sayA() { echo "A "; } }
trait B { public function sayB() { echo "B "; } }

class MyClass {
    use A, B;
}
$obj = new MyClass();
$obj->sayA();
$obj->sayB();

```
- Output:
```
A B
```

#### 6️⃣ Trait Conflict Resolution

- If two traits define a method with the same name, PHP needs to know which one to use.
- Use:

- insteadof → to choose one

- as → to rename a method or change visibility

- Example:

```php
trait A {
    public function sayHello() { echo "Hello from A"; }
}
trait B {
    public function sayHello() { echo "Hello from B"; }
}

class MyClass {
    use A, B {
        A::sayHello insteadof B;
        B::sayHello as sayHelloFromB;
    }
}

$obj = new MyClass();
$obj->sayHello();        // Hello from A
$obj->sayHelloFromB();   // Hello from B
```

#### 7️⃣ Changing Method Visibility in Traits

- You can use as to change visibility (public, protected, private):

```php
trait Demo {
    public function show() { echo "Showing"; }
}

class Test {
    use Demo { show as protected; }
}

```
- Now show() becomes protected inside Test.


#### 8️⃣ Traits + Abstract Methods

- A trait can define abstract methods that any class using the trait must implement.

```php
trait Shape {
    abstract public function area();
    public function printArea() {
        echo "Area: " . $this->area();
    }
}

class Square {
    use Shape;
    public function area() { return 25; }
}

(new Square())->printArea(); // Area: 25

```

#### 9️⃣ Traits Can Use Other Traits (Nested Traits)

- Traits can include other traits:

```php
trait A { public function a() { echo "A "; } }
trait B { use A; public function b() { echo "B "; } }

class C { use B; }

(new C())->a(); // A
(new C())->b(); // B

```
#### 🔟 Traits vs Inheritance vs Interfaces

| Feature | Trait | Inheritance | Interface |
|----------|--------|--------------|------------|
| **Code reuse** | ✅ Yes | ✅ Yes | ❌ No (only contracts) |
| **Multiple support** | ✅ Yes | ❌ Single only | ✅ Multiple |
| **Can define properties** | ✅ Yes | ✅ Yes | ❌ No |
| **Can define abstract methods** | ✅ Yes | ✅ Yes | ✅ Yes |
| **Purpose** | Code reuse | IS-A relationship | Contract (HAS-A behavior) |

#### 🧩 Real-world example — Logging system
```php
trait Logger {
    public function log($message) {
        echo "[LOG] $message" . PHP_EOL;
    }
}

trait Timestamp {
    public function timestamp() {
        return date('Y-m-d H:i:s');
    }
}

class Order {
    use Logger, Timestamp;
    public function create() {
        $this->log("Order created at " . $this->timestamp());
    }
}

$order = new Order();
$order->create();

```
- Output:

```
[LOG] Order created at 2025-10-27 10:30:00
```
#### 🧠 Trait Rules Summary

| Rule | Description |
|------|--------------|
| **Define with `trait`** | `trait TraitName { ... }` |
| **Include in class** | `use TraitName;` |
| **Use multiple traits** | `use A, B;` |
| **Resolve conflicts** | `TraitA::method insteadof TraitB;` |
| **Rename methods** | `TraitB::method as newName;` |
| **Change visibility** | `TraitB::method as protected;` |
| **Can have properties** | ✅ |
| **Can have static methods** | ✅ |
| **Can use other traits** | ✅ |

- Traits = code reuse tool, not inheritance.

- Can use multiple traits in one class.

- Conflict resolution handled via insteadof and as.

- Great for shared logic like logging, timestamps, authorization, etc.

- No instantiation — you cannot new TraitName().



### 🔹14.  PHP Interfaces — Complete Concept Guide
#### 1️⃣ What is an Interface?

- An interface in PHP is like a contract or blueprint for classes.

- It defines what methods a class must have, but not how they should work.

```
Think of it like a rulebook:
“If a class implements this interface, it must include all the methods declared in it.”
```

#### 2️⃣ Why use Interfaces?

- They help ensure consistency across different classes that perform similar actions.

```
✅ They enforce a common structure.
✅ They enable polymorphism (treating different classes the same way).
✅ They are a key to decoupled and flexible architecture.

```

#### 3️⃣ Defining an Interface

- Syntax:
```php
interface InterfaceName {
    public function methodName();
}

```
- All methods in an interface are public (by default).
- You cannot define properties or method bodies in interfaces (only method signatures).


#### 4️⃣ Implementing an Interface

- A class uses the implements keyword to follow (implement) the interface.

```php
interface Logger {
    public function log(string $message);
}

class FileLogger implements Logger {
    public function log(string $message) {
        echo "Log saved to file: $message";
    }
}

```
- If a class doesn’t implement all interface methods, PHP throws a fatal error.

#### 5️⃣ Multiple Interfaces

- A class can implement more than one interface (✅ multiple inheritance of type).

```php
interface Logger {
    public function log(string $message);
}
interface Notifier {
    public function send(string $message);
}

class App implements Logger, Notifier {
    public function log(string $message) { echo "Logging: $message\n"; }
    public function send(string $message) { echo "Sending: $message\n"; }
}
```

- ✅ This is multiple interface implementation.

#### 6️⃣ Interface Inheritance

- Interfaces can extend other interfaces (but classes can’t extend multiple classes).

```php
interface Base {
    public function baseMethod();
}

interface Advanced extends Base {
    public function advancedMethod();
}

class Demo implements Advanced {
    public function baseMethod() {}
    public function advancedMethod() {}
}
```

#### 7️⃣ Constants in Interfaces

- Interfaces can have constants, but not properties.

```php
interface Config {
    const APP_NAME = "MyApp";
}

echo Config::APP_NAME; // ✅ Works
```

#### 🧾 PHP Interface Rules Summary

| Rule | Description |
|------|--------------|
| Define with `interface` | `interface MyInterface { ... }` |
| Implement in class | `class MyClass implements MyInterface { ... }` |
| Method visibility | Always public |
| Can have properties | ❌ No |
| Can have constants | ✅ Yes |
| Can have method bodies | ❌ No |
| Can extend other interfaces | ✅ Yes |
| A class can implement multiple interfaces | ✅ Yes |
| Must implement all methods | ✅ Yes |
| Instantiation allowed? | ❌ No |

#### 🧠 Why We Inject Interfaces (Not Concrete Classes)

##### 1️⃣ The Core Idea

- When we “inject an interface”, we’re saying:

- “I don’t care how you do the job — I just care that you can do it.”

- This means our class depends on a contract (interface), not on a specific implementation.

##### 2️⃣ Without Interface Injection ❌

- Let’s see the problem first:

```php
class SmtpMailer {
    public function send($to, $msg) {
        echo "Sending mail via SMTP to $to";
    }
}

class UserService {
    private $mailer;

    public function __construct() {
        $this->mailer = new SmtpMailer(); // ❌ Tight coupling
    }

    public function notify($email) {
        $this->mailer->send($email, "Welcome!");
    }
}
```
##### 🔴 Problem:

- UserService is tightly coupled to SmtpMailer.

- If you later want to use a new class SendGridMailer, you’d have to edit the UserService code.

- This breaks OOP principles like Open/Closed (O in SOLID).

##### 3️⃣ With Interface Injection ✅

- Define an interface (a contract):

```php
interface Mailer {
    public function send(string $to, string $msg);
}
```

#### Now create different implementations:

```php
class SmtpMailer implements Mailer {
    public function send(string $to, string $msg) {
        echo "Sent mail via SMTP to $to\n";
    }
}

class SendGridMailer implements Mailer {
    public function send(string $to, string $msg) {
        echo "Sent mail via SendGrid to $to\n";
    }
}

```
- Then inject the interface into UserService:

```php
class UserService {
    private Mailer $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function notify($email) {
        $this->mailer->send($email, "Welcome!");
    }
}

```

- Now you can swap mailers easily:
```php


$user1 = new UserService(new SmtpMailer());
$user1->notify('kunal@example.com');

$user2 = new UserService(new SendGridMailer());
$user2->notify('test@example.com');


Output:

Sent mail via SMTP to kunal@example.com
Sent mail via SendGrid to test@example.com
```

```

✅ You didn’t modify UserService at all.
✅ You can add new mailers anytime.
✅ Your code is flexible, testable, and maintainable.
```


### 15. 🧠 What is Encapsulation?

```
Encapsulation means hiding the internal details of how a class works
and protecting the data (properties) from being accessed or changed directly from outside.
```
- In simple words:
```
“Wrap data and methods that work on that data into one unit (a class),
and control how that data is accessed.”
```

#### 🧱 Real-Life Example

- Think of a bank account:

- You can deposit or withdraw money.

- But you can’t directly change the account balance in the bank’s computer.

- You have to go through proper methods (deposit/withdraw).
- That’s encapsulation — your balance is protected, not public.

###### 💻 PHP Example — Without Encapsulation (❌ Bad)
```php
class BankAccount {
    public $balance = 0; // ❌ Public property (anyone can change it)
}

$acc = new BankAccount();
$acc->balance = -5000; // ❌ No control, invalid data
echo $acc->balance; // -5000


This is dangerous — we allowed direct access to the data.
```
##### ✅ With Encapsulation (Good Practice)
```php
class BankAccount {
    private $balance = 0; // 🔒 Private = hidden from outside

    // ✅ Method to deposit money safely
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    // ✅ Method to withdraw money safely
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }

    // ✅ Method to view balance
    public function getBalance() {
        return $this->balance;
    }
}

// 🎯 Usage
$acc = new BankAccount();
$acc->deposit(1000);
$acc->withdraw(300);
echo "Balance: " . $acc->getBalance();

🧾 Output:
Balance: 700
```

#### 🔍 What Happened Here
- Concept	Description
- $balance	Declared private — can’t be changed directly from outside.
- deposit() & withdraw()	Provide controlled access to modify balance.
- getBalance()	Public method to read data safely.

#### ⚙️ Access Modifiers (Visibility Keywords)
- Keyword	Who can access	Use case
- public	Anywhere	When everyone can access it
- protected	Same class + child classes	For inheritance
- private	Only within the same class	To hide data

#### 💡 Why Encapsulation Matters
- Benefit	Description
- Data protection	Prevents unwanted or invalid changes to variables
- Control	You control how others use your class
- Flexibility	You can change internal logic without affecting outside code
- Maintainability	Cleaner, more reliable, and less error-prone code

#### 🧩 Real-world Analogy
- Real World	Programming
- ATM machine	BankAccount class
- You can only press buttons (public methods)	You can’t open the machine (private data)
- Machine checks limits and rules internally	Class validates input internally
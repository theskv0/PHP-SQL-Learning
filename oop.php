<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// $arr1 = ['1a' => 'aa1', '1b' => 'aa2'];
// $arr2 = ['2a' => 'bb1', '2b' => 'bb2'];

// $arr3 = array_combine($arr1, $arr2);

// var_dump($arr3);

// ECHO                                         PRINT
// echo has no return value                     print has a return value of 1 so it can be used in expressions. 
// echo can take multiple parameters            print can take one argument. 
// echo is marginally faster than print.        slower


// Interface Class                                                 Abstract Class
// Interface class supports multiple inheritance feature           Abstract class does not support multiple inheritances.
// This does not contain a data member.                            Abstract class does contain a data member.
// The interface does not allow containers.                        The abstract class supports containers.
// An interface class only contains incomplete members which 
// refer to the signature of the member.                           Abstract class contains both incomplete(i.e. abstract) 
// Since everything is assumed to be public, an interface class    and complete members.
// does not have access modifiers by default.                      An abstract class can contain access modifiers within subs, 
//                                                                 functions, and properties.
// Any member of an interface cannot be static.                    Only a complete member of the abstract class can be static.

// Abstract classes should be used primarily for objects that are closely related, whereas interfaces are best suited f
// or providing a common functionality to unrelated classes.

// const FOO = 'BAR';    // Valid
// if (true) {
//     // const BAR = 'BAR';    // Invalid
// }
// // but
// if (true) {
//     define('FOO', 'BAR'); // Valid
// }

// CONST                                            Define
// defines constants at compile time                define() defines them at run time.
// can't use const in conditional blocks            define() we can use that.
// static scalar(number, string or other 
// constants like true, false, null, __FILE__),     define() takes any expression.
// consts are always case sensitive,                define() allows to define case insensitive by passing true 
//                                                  as the third argument.
// const can also be utilized within a class        define() can't be utilized for this reason
// interface to declare a class constant or 
// interface constant

// pass by reference
// $a = 1;
// $b = &$a;
// $b = 2;
// echo $a;

// $std1 = new stdClass;
// $std2 = new stdClass;
// var_dump($std1 == $std2);
// var_dump($std1 === $std2);
// $std3 = clone $std1;    // pass by value
// $std3 = $std1;    // pass by reference
// var_dump($std1 === $std3);

// try {
//     print "this is our try block \n";
//     throw new Exception();
// } catch (Exception $e) {
//     print "something went wrong, caught yah! \n";
// } finally {
//     print "this part is always executed \n";
// }

// A notice is a non-critical error saying something went wrong in execution, 
// something minor like an undefined variable.
// A warning is given when a more critical error like if an include() command 
// went to retrieve a non-existent file. In both this and the error above, 
// the script would continue.
// A fatal error would terminate the code. Failure to satisfy a require() 
// would generate this type of error, for example.

// There's no difference - they are the same. The only advantage of choosing die() 
// over exit(), might be the time you spare on typing an extra letter.

// It is a set of PHP extensions that provide a core PDO class and database, specific drivers. 
// It provides a vendor-neutral, lightweight, data-access abstraction layer. Thus, no matter 
// what database we use, the function to issue queries and fetch data will be same. 
// It focuses on data access abstraction rather than database abstraction.


// var_dump($obj)will display below output in the screen:
// object(stdClass)#1 (3) {
//  [0]=> string(12) "qualitypoint"
//  [1]=> string(12) "technologies"
//  [2]=> string(5) "India"
// }

// print_r($obj)
// stdClass Object ( 
//     [0] => qualitypoint
//     [1] => technologies
//     [2] => India
// )

// != means inequality (TRUE if $a is not equal to $b) and !== means non-identity (TRUE if $a is not identical to $b).

// $a = array('key1' => 'Foo Bar', 'key2' => null);
// echo isset($a['key1']) ? 'Y' : 'N';             // true
// echo array_key_exists('key1', $a) ? 'Y' : 'N';  // true
// echo isset($a['key2']) ? 'Y' : 'N';             // false
// echo array_key_exists('key2', $a) ? 'Y' : 'N';  // true
// echo isset($a['key3']) ? 'Y' : 'N';             // false
// echo array_key_exists('key3', $a) ? 'Y' : 'N';  // false

// The require() function is identical to include(), except that it handles errors differently. 
// If an error occurs, the include() function generates a warning, but the script will continue execution. 
// The require() generates a fatal error, and the script will stop.

// exec() is for calling a system command, and perhaps dealing with the output yourself.
// system() is for executing a system command and immediately displaying the output - presumably text.
// passthru() is for executing a system command which you wish the raw return from - presumably something binary.

//////////// Singleton Design Patern /////////////
// Singleton is a creational design pattern, which ensures that only one object of its kind exists and provides 
// a single point of access to it for any other code. You can't just use a class that depends on Singleton in some 
// other context.
// Singleton can be used like a global variable.
// It can have only one instance (object) of that class unlike normal class.
// When we don't want to create a more than one instance of a class like database connection or utility 
// library we would go for singleton pattern.
// Singleton makes sure you would never have more than one instance of a class.
// Make a construct method private to make a class Singleton.
// Singleton class
// final class UserFactory {
//     public static function Instance() {
//         static $inst = null;
//         if ($inst === null) {
//             $inst = new UserFactory();
//         }
//         return $inst;
//     }
//     private function __construct() {}
// }
// // $fact = new UserFactory()   // error
// $fact = UserFactory::Instance();
// $fact2 = UserFactory::Instance();
// var_dump($fact === $fact2);     // true


// There are following functions which can be used from Exception class.
// getMessage() − message of exception
// getCode() − code of exception
// getFile() − source filename
// getLine() − source line
// getTrace() − n array of the backtrace()
// getTraceAsString() − formated string of trace
// Exception::__toString gives the string representation of the exception.

// array_walk takes an array and a function F and modifies it by replacing every element x with F(x).
// array_map does the exact same thing except that instead of modifying in-place it will return a new 
// array with the transformed elements.
// array_filter with function F, instead of transforming the elements, will remove any elements for 
// which F(x) is not true

// Null coalescing operator returns its first operand if it exists and is not NULL. Otherwise it returns its second operand.
// $name = $firstName ?? $username ?? $placeholder ?? "Guest"; 

// // The answer is true. You should never use == for string comparison. Even if you are comparing strings to strings, PHP will 
// // implicitly cast them to floats and do a numerical comparison if they appear numerical. === is OK.
// $something = 0;
// echo ('password123' == $something) ? 'true' : 'false';  // true
// echo ('1e3' == '1000') ? 'true' : 'false';  // true
// echo strcmp('1e3', '1000');  // it will return number

// // echo strrev(1234321);
// echo strtoupper('suMit');
// echo strtolower('suMit');
// echo ucfirst('suMit');
// echo lcfirst('SuMit');
// echo lcfirst('SuMit');
// echo ucwords('SuMit verma');
// echo strlen('SuMit verma');
// echo trim(' SuMit verma ');
// echo ltrim(' SuMit verma ');
// echo rtrim(' SuMit verma ');

// $a = "Original";
// $my_array = array("a" => "Cat","b" => "Dog", "c" => "Horse");
// extract($my_array);
// echo "\$a = $a; \$b = $b; \$c = $c";

// echo microtime();

// Late static binding
// class Car{
//     public static function run(){
//         return static::getName();
//     }
//     public static function run2(){
//         return self::getName();
//     }
//     private static function getName(){
//         return 'Car';
//     }
// }
// class Toyota extends Car{
//     public static function getName(){
//         return 'Toyota';
//     }
// }
// echo Car::run(); // Output: Car
// echo Toyota::run(); // Output: Toyota
// echo Car::run2(); // Output: Toyota
// echo Toyota::run2(); // Output: Toyota

// // What is the best method to merge two PHP objects?
// $obj_merged = (object) array_merge((array) $obj1, (array) $obj2);

// // Spaceship operator
// print( 1 <=> 1);print("<br/>"); // 0
// print( 1 <=> 2);print("<br/>"); // -1
// print( 2 <=> 1);    // 1


////////////// Singalton
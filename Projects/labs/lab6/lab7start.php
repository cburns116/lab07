<?php 
  abstract class Operation {
    protected $operand_1;
    protected $operand_2;
    public function __construct($o1, $o2) {
      // Make sure we're working with numbers...
      if (!is_numeric($o1) || !is_numeric($o2)) {
        throw new Exception('Non-numeric operand.');
      }
      
      $this->operand_1 = $o1;
      $this->operand_2 = $o2;
    }
    public abstract function operate();
    public abstract function getEquation(); 
  }

  class Addition extends Operation {
    public function operate() {
      return $this->operand_1 + $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' + ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }

  /**
  * 
  */
  class Subtraction extends Operation
  {
    public function operate() {
      return $this->operand_1 - $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }
  class Multiplication extends Operation
  {
    public function operate() {
      return $this->operand_1 * $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' * ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }
  class Division extends Operation
  {
    public function operate() {
      return $this->operand_1 / $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }
  class Cube extends Operation
  {
    public function operate() {
      return pow($this->operand_1,3);
    }
    public function getEquation() {
      return $this->operand_1 . ' ^3  = ' . $this->operate();
    }
  }
  class Factorial extends Operation
  {
    public function operate() {
      $factorial1 = 1;
      for($x=1; $x <= $this->operand_1; $x++){
        $factorial1 *= $x;
    }
    return $factorial1;
    }
    public function getEquation() {
      return $this->operand_1 . ' != ' . $this->operate();
    }
  }
// Part 1 - Add subclasses for Subtraction, Multiplication and Division here



// End Part 1




// Some debugs - un comment them to see what is happening...
// echo '$_POST print_r=>',print_r($_POST);
// echo "<br>",'$_POST vardump=>',var_dump($_POST);
// echo '<br/>$_POST is ', (isset($_POST) ? 'set' : 'NOT set'), "<br/>";
// echo "<br/>---";




// Check to make sure that POST was received 
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Part 2 - Instantiate an object for each operation based on the values returned on the form
//          For example, check to make sure that $_POST is set and then check its value and 
//          instantiate its object
// 
// The Add is done below.  Go ahead and finish the remiannig functions.  
// Then tell me if there is a way to do this without the ifs

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add') {
      $op = new Addition($o1, $o2);
    }
    if (isset($_POST['sub']) && $_POST['sub'] == 'Subtract') {
      $op = new Subtraction($o1, $o2);
    }
    if (isset($_POST['mult']) && $_POST['mult'] == 'Multiply') {
      $op = new Multiplication($o1, $o2);
    }
    if (isset($_POST['div']) && $_POST['div'] == 'Divide') {
      $op = new Division($o1, $o2);
    }
    if (isset($_POST['cube']) && $_POST['cube'] == 'Cube') {
      $op = new Cube($o1, $o2);
    }
    if (isset($_POST['fact']) && $_POST['fact'] == 'Factorial') {
      $op = new Factorial($o1, $o2);
    }

// Put the code for Part 2 here  \/





// End of Part 2   /\

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!doctype html>
<html>
<head>
<title>Lab 7</title>
<style>
  #button { padding: .5em 1em; text-decoration: none; }
  input[type=text]{
    border: 2px solid red;
    border-radius: 4px;
    background-color: #3CBC8D;
    color: red;
  }
</style>

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
 $(function() {
    $( "#button-1, #button-2, #button-3, #button-4, #button-5, #button-6" ).button();
    $( "#button-5").buttonset();
    $("#button-1").tooltip();
    $("#button-2").tooltip();
    $("#button-3").tooltip();
    $("#button-4").tooltip();
    $("#button-5").tooltip();
    $("#button-6").tooltip();
    $("#name").tooltip();
    $("#name1").tooltip();
 });


</script>
</head>
<body>
  <pre id="result">
  <?php 
    if (isset($op)) {
      try {
        echo $op->getEquation();
      }
      catch (Exception $e) { 
        $err[] = $e->getMessage();
      }
    }
      
    foreach($err as $error) {
        echo $error . "\n";
    } 
  ?>
  </pre>
  <form method="post" action="lab7start.php">
    <input type="text" name="op1" class = "inputs" id="name" value="Enter Operand 1 here" title = "Enter a digit for calulations"/>
    <input type="text" name="op2" class = "inputs" id="name1" value="Enter Operand 2 here" title = "Enter a digit for calulations"/>
    <br/>
    <!-- Only one of these will be set with their respective value at a time -->
    <input type="submit" name="add" value="Add" id = "button-1" title = "This adds the first input with the second"/>  
    <input type="submit" name="sub" value="Subtract" id = "button-2" title = "This subtracts the first input from the second"/>  
    <input type="submit" name="mult" value="Multiply" id = "button-3" title = "This multiplies the first input with the second"/>  
    <input type="submit" name="div" value="Divide" id = "button-4" title = "This divides the first input by the second"/> 
    <input type="submit" name="cube" value="Cube" id = "button-5" title = "This cubes the first input"/>  
    <input type="submit" name="fact" value="Factorial" id = "button-6" title = "This gets the factorial for the first input"/> 
    
  </form>
</body>
</html>


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


// Part 1 - Add subclasses for Subtraction, Multiplication and Division here
	class Subtraction extends Operation {

		public function operate() {
			return $this->operand_1 - $this->operand_2;
		}

		public function getEquation() {
			return $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate();
		}


	}
	class Multiplication extends Operation {

		public function operate() {
			return $this->operand_1 * $this->operand_2;
		}

		public function getEquation() {
			return $this->operand_1 . ' * ' . $this->operand_2 . ' = ' . $this->operate();
		}


	}

	class Division extends Operation {

		public function operate() {
			return $this->operand_1 / $this->operand_2;
		}

		public function getEquation() {
			return $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate();
		}


	}


	class Cube extends Operation {
	public function __construct($o1) {
      // Make sure we're working with numbers...
      if (!is_numeric($o1)) {
        throw new Exception('Non-numeric operand.');
      }

      $this->operand_1 = $o1;

    }

		public function operate() {
			return $this->operand_1 * $this->operand_1 * $this->operand_1;
		}

		public function getEquation() {
			return $this->operand_1 . '^3  = ' . $this->operate();
		}


	}

	class Factorial extends Operation {
	public function __construct($o1){
      // Make sure we're working with numbers...
      if (!is_numeric($o1)) {
        throw new Exception('Non-numeric operand.');
      }

      $this->operand_1 = $o1;

    }

		public function operate() {
			$total = 1;

			for ($i = $this->operand_1; $i >0; $i--)
				$total = $total * $i;

			return $total;

		}

		public function getEquation() {
			return $this->operand_1 . '!  = ' . $this->operate();
		}


	}


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
// Put the code for Part 2 here  \/
	else if (isset($_POST['sub']) && $_POST['sub'] == 'Subtract') {
      $op = new Subtraction($o1, $o2);
    }
	else if (isset($_POST['mult']) && $_POST['mult'] == 'Multiply') {
      $op = new Multiplication($o1, $o2);
    }
	else if (isset($_POST['div']) && $_POST['div'] == 'Divide') {
      $op = new Division($o1, $o2);
    }
	else if (isset($_POST['cube']) && $_POST['cube'] == 'Cube') {
      $op = new Cube($o1);
    }
	else if (isset($_POST['fact']) && $_POST['fact'] == 'Factorial') {
      $op = new Factorial($o1);
    }




// End of Part 2   /\

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!doctype html>
<html>
<head>
<title>Lab 6</title>


 <style>
    .toggler { width: 500px; height: 200px; position: relative; }
    #button { padding: .5em 1em; text-decoration: none; }
    #effect { width: 240px; height: 170px; padding: 0.4em; position: relative; background: #fff; }
    #effect h3 { margin: 0; padding: 0.4em; text-align: center; }
	body {background: 	#ADD8E6;}
  </style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
		 $( document ).tooltip({
			 show: {
				 effect: "slideDown",
				 delay: 250
			 },
			 hide: {
				 effect: "explode",
				 delay: 250
			 }
			 
			 
		 });
        $( "#result" ).animate({
          backgroundColor: "#aa0000",
          color: "#fff",
          width: 500
        }, 1000 );
      
  } );
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
  <form method="post" action="index.php">
    <input type="text" name="op1" id="name1" title="enter operand 1 here" />
    <input type="text" name="op2" id="name2" title="enter operand 2 here"/>
    <br/>
	
	
	
    <!-- Only one of these will be set with their respective value at a time -->
    <input type="submit" name="add" title="click me to add the two together" value="Add" class="button" />
    <input type="submit" name="sub" title="click me to subtract the two" value="Subtract" class="button"/>
    <input type="submit" name="mult" title="click me to multiply the two together" value="Multiply" class="button"/>
    <input type="submit" name="div" title="click me to divide the two" value="Divide" class="button"/>
	<input type="submit" name="cube" title="click me to cube the first operand" value="Cube" class="button"/>
	<input type="submit" name="fact" title="click me to take the factorial of the first operand" value="Factorial" class="button"/>
  </form>
  
  
</body>
</html>

<?php 
// file to be used on this test, it has 100 combinations of "Pancakes".
$file = fopen("B-small-practice.in", "r");
// Counter to show how many lines the file has.
$count = 1;

// loop while to get each line after to file open
  while(! feof($file)) {
    // variables declarations, getting the lines from the file
    $line = trim(fgets($file));
    $pancakeStr = $line;
    $pancakeCount = strlen($pancakeStr);
    $flips = 0;
    $diff = false;
    $strX = "";
    // take the first value so that help us with to identify the other's values in the Pancakes Stack (PS)
    $pancake = substr($pancakeStr, 0, 1);

    // to be sure that the line will belong to the PS
    if(substr($line, 0, 1) == '-' || substr($line, 0, 1) == '+') {
      // we need to know if the Pancakes Stack is mayor than 1 to proceed to apply with the business logic
      if ($pancakeCount > 1) {
        // loop for to iterate in each value of the PS then the logic is applied
        for ($x = 1; $x < $pancakeCount; $x++) {
          $pancX = substr($pancakeStr, $x, 1);          
            if ($pancake == $pancX) {
              if ($diff) {$flips++;}
              $strX = ($pancake == '+' ? '-' : '+') . ($pancX == '+' ? '-' : '+');
              $diff = false;
            } else {
              if (!$diff) {$flips++;}
              if ($pancakeCount == 2) {
                $strX = ($pancake == '+' ? '-' : '+') . $pancX;
              } else {
                $strX = $strX . $pancX;
              }
              $diff = true;
            }
        }
      } else {
        // if there is only one PS and the happy face isn't front will be to flip it up
        if ($pancake == '-') {
          $flips++;
        }
      }  

      $pancakeStr = $strX;
      $hfTrueCount = substr_count($pancakeStr, '+');
      $hfFalseCount = substr_count($pancakeStr, '-');

      if ($pancakeCount == $hfFalseCount) {
        $flips++;
        $pancakeStr = str_replace('-', '+', $pancakeStr);
      }
      // printing the results 
      echo "$count)  $line [ $pancakeCount ] Flips Count => [ $flips ] \r\n";
      $count++;
    }
  }
  // after to use the file, this needs to proceed to close
  fclose($file);


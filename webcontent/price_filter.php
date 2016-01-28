<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Price sort testing</title>
  <link rel="stylesheet" href="css/price_filter.css">
</head>
<body>
  <form name="testsort" id="testsort" method="post" action="<?php echo $url_host ?>Price-sort">
    <select name="sorttype" id="sorttype" class="sorttype1">
      <option value="lowesttohighest">Lowest to highest</option>
      <option value="highesttolowest">Highest to lowest</option>
    </select>
    <input type="submit" class="button" value="Sort">
    <input type="reset" class="button">
  </form>
</body>
</html>
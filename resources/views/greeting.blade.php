<!-- View stored in resources/views/greeting.blade.php -->
<html>
<body>
<h1>Hello, {{ $name }} {{ $last_name }}</h1> <!-- laravel -->
<h1>Hello, <?php echo $name;  echo $last_name; ?> </h1>
</body>
</html>

<html>
<head>
<title>Ошибка</title>
</head>
<body>
   <?php if($type == "HTTP_Exception_404"): ?>
     <h1>Извините, такая страница не найдена!</h1>
   <?php elseif($type == "HTTP_Exception_403"): ?>
     <h1>Извините, доступ к этой странице закрыт!</h1>
   <?php else: ?>
     <h1>Произошла неизвестная нам ошибка! Мы над ней уже работаем!!</h1>
   <?php endif ?>
</body>
</html>
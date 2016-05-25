<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="keywords" content="content">
    <meta name="discription" content="content">
    <link rel="stylesheet" href="/template/css/style.css">
</head>
<body>
    <dev class="wrapper">
        <div class="container">
            <header>
                <nav>
                    <ul>
                        <li><a class="active" href="#">Главная</a></li>
                        <li><a href="#">Продукты</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li class="nav__float-right"><a href="#">О нас</a></li>
                    </ul>
                </nav>
            </header>

            <main>
                <?php foreach ($newList as $index => $arrayNews): ?>
                <section>
                    <h1><?php echo $arrayNews['title']; ?></h1>
                    <p><?php echo $arrayNews['short_content']; ?></p>
                    <p><a href="<?php echo '/news/' . $arrayNews['id'] ?>">Далее</a></p>
                    <span>Дата: <?php echo $arrayNews['date'] ?></span>
                </section>
                <?php endforeach ?>
            </main>

            <aside>
                <section>
                    <h2>Боковая панель</h2>
                    <p>Описание</p>
                    <span>Текст</span>
                    <span><a href="">Ссылка</a></span>
                </section>
            </aside>

        <footer>
            <p>
                &copy; 2016
            </p>
        </footer>

        </div><!-- END CONTAINER -->
    </dev><!-- END WRAPPER -->
</body>
</html>

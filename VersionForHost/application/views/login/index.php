<head>
    <title>Страница авторизации</title>
    <?php require __DIR__ . '/../head.php'; ?>
</head>
<body>
    <h1>Страница авторизации</h1>
    <div>
    <form method="POST" role="form" action="" id="form" novalidate>
        <div class="form-group">
            <label for="name">Введите логин пользователя</label>
            <input type="text" class="form-control" name="login" id="login" required />
            <label for="email">Введите пароль пользователя</label>
            <input type="text" class="form-control" name="password" id="password" required/>
        </div>
        <button name="submit" type="submit" class="btn btn-success">Войти</button>
    </div>
</body>




<?php $url = $_SERVER['REQUEST_URI']; ?>

<div class="container my-5" style="width: 50%">

<?php if (isset($_SESSION['errors']['auth'])) : ?>
    <?php foreach ($_SESSION['errors']['auth'] as $field => $error) : ?>
    
        <div class="alert alert-warning" role="alert">
            <?=$error ?>
        </div>

    <?php endforeach; ?>
<?php endif; ?>

    <h2 class="mb-5 color-brown">Авторизация</h2>

    <form action="<?php echo $url; ?>" method="post" name="auth">

        <label for="login" class="form-label">Введите логин</label>
        <input type="email" 
            class="form-control mb-3" 
            name="login" 
            placeholder="Email" 
            required
        >
        
        <label for="password" class="form-label">Введите пароль</label>
        <input type="password" 
            class="form-control mb-3" 
            name="password" 
            placeholder="password" 
            required
        >

        <input type="hidden" name="CSRF" value="<?php echo $_SESSION['CSRF'] ?? '' ?>">

        <input type="submit" class="btn btn-danger my-3" name="submit" value="Войти">            

        <a class="btn btn-outline-danger mx-3"  href="/" role="button">На главную</a>     

    </form>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> -->

<div class="container my-5 width-50" style="width: 50%">

    <?php if (isset($_SESSION['errors']['register'])) : ?>
        <?php foreach ($_SESSION['errors']['register'] as $field => $error) : ?>
        
            <div class="alert alert-warning" role="alert">
                <?=$error ?>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>

    <h2 class="mb-5 color-brown">Регистрация</h2>

    <form method="post" id="registerForm">

        <label for="name" class="form-label">Введите имя</label>
        <input type="text" 
            class="form-control mb-3" 
            name="name" 
            placeholder="Name" 
            required
        >

        <label for="login" class="form-label">Введите логин</label>
        <input type="email" 
            class="form-control mb-3"             
            name="login" 
            placeholder="Email" 
            required
        >

        <label for="password" class="form-label">
                Введите пароль (не менее 6 символов)
        </label>
        <input type="password" 
            class="form-control mb-3" 
            name="password" 
            placeholder="Password" 
            required
        >

        <div class="form-check my-4">
            <input class="form-check-input" 
                type="radio" 
                name="role" 
                id="customer" 
                value="customer"
            >
            <label class="form-check-label" for="customer">
                Я - рекламодатель
            </label>
        </div>

        <div class="form-check my-4">
            <input class="form-check-input" 
                type="radio" 
                name="role" 
                id="webmaster" 
                value="webmaster"
            >
            <label class="form-check-label" for="webmaster">
                Я - веб-мастер
            </label>
        </div>

        <input type="submit" class="btn btn-danger my-3" name="submit" value="Отправить">

        <a class="btn btn-outline-danger mx-3"  href="<?=URL ?>" role="button">На главную</a> 
    </form>
    
</div>
<!-- <script src="public/js/register.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> -->

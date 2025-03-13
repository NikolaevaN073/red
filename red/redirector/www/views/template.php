<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <title><?=$title?></title>
</head>
<body>
    <header>
        <div class="container">                        
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid mt-2">                   
                    <a class="nav-link" href="<?=URL ?>">
                        <h3>Система-редиректор 
                            <span class="color-brown">SF-AdTech</span>
                        </h3>
                    </a>                        
                </div>
                <div>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a class="nav-link" href="<?='auth/logout'; ?>">
                            <span class="color-brown">Выход</span>     
                        </a>
                    <?php endif; ?> 
                </div>
            </nav>   
        </div>         
        <hr>
    </header>
    <div>       
        <?php include ROOT_DIR .'/views/'. $content_view; ?>                
    </div>   
</body>
</html>

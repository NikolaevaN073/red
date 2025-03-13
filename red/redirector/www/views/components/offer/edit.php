<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <title><?=$title?></title>
</head>

<div class="container my-5" id="pageEditOffer"> 

<div class="col-sm-7">    

<?php
$offer = $payload['offer'];
$categories = $payload['categories'];

//var_dump($payload);
?>


    <h4 class="my-3 textalign-left color-brown">Редактирование оффера</h4>

        <form action="/customer/update" method="post" id="offerEditForm" name="update"> 

            <label for="category" class="form-label">Тема</label>
            <select class="form-select" aria-label="Default select" name="category_id">
                <option value="<?php echo $offer->category['category_id'] ?>" selected> 
                    <?=$offer->category['category_name'] ?>
                </option>
                <?php                 
                foreach ($categories as $category) : ?>                    
                    <option value="<?=$category['id']?>" id="category" required>
                        <?=$category['name']?>
                    </option>                     
                <?php endforeach ?>   
            </select>

            <input type="hidden" name="id" value="<?=$offer->id ?>" >

            <label for="name" class="form-label">Название</label>
            <input type="text" 
                class="form-control mb-2" 
                name="name" 
                value="<?=$offer->name; ?>"
                id="offerName" 
                required
            >

            <label for="description" class="form-label">Описание</label>
            <textarea
                class="form-control mb-2" 
                name="description"                     
                id="description" 
            >
                <?=$offer->description ?>    

            </textarea> 

            <label for="price" class="form-label">Стоимость</label>
            <input type="number" 
                class="form-control mb-2" 
                name="price" 
                value="<?=$offer->price ?>"
                id="price" 
                required
            >
            <label for="url" class="form-label">Ссылка</label>
            <input type="text" 
                class="form-control mb-2" 
                name="url" 
                value="<?=$offer->url; ?>" 
                id="url" 
                required
            >  
            
            <label for="status" class="form-label">Статус</label>
            <select class="form-select" aria-label="Default select" name="status">
                                
                <option value="active"
                    <?php if ($offer->status === 'active') :  ?>
                        selected
                    <?php endif ?>
                >
                    Активный
                </option>
                
                <option value="archived"
                    <?php if ($offer->status === 'archived') :  ?>
                        selected
                    <?php endif ?>
                >
                    Архивный
                </option>

            </select>
            
            <input type="hidden" name="customer_id" value="<?=$_SESSION['user_id'] ?>">
            
            <button type="submit" 
                class="btn btn-danger my-5" 
                id="updateOffer" 
                name="update">
                    Сохранить
            </button>
            
        </form>

        <a class="btn btn-outline-danger mx-3"  href="/customer" role="button">Назад</a>     
    </div> 

</div>

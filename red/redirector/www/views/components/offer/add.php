<div class="container my-5" id="pageCreateOffer"> 

<div class="col-sm-7">        
        <h4 class="my-3 textalign-left color-brown">Добавление оффера</h4>

        <form method="post" id="offerCreateForm">

            <label for="category" class="form-label">Выберите тему</label>
            <select class="form-select" aria-label="Default select" name="category_id">
                <option selected>---</option>
                <?php 
                $categories = $payload['categories'];
                foreach ($categories as $category) : ?>                    
                    <option value="<?=$category['id']?>" id="category" required>
                        <?=$category['name']?>
                    </option>                     
                <?php endforeach ?>   
            </select>

            <label for="name" class="form-label">Введите название</label>
            <input type="text" 
                class="form-control mb-2" 
                name="name" 
                placeholder="Name" 
                id="offerName" 
                required
            >

            <label for="description" class="form-label">Введите описание</label>
            <textarea
                class="form-control mb-2" 
                name="description"                     
                id="description" 
            >
            </textarea> 

            <label for="price" class="form-label">Введите стоимость</label>
            <input type="number" 
                class="form-control mb-2" 
                name="price" 
                placeholder="RUB" 
                id="price" 
                required
            >
            <label for="url" class="form-label">Введите ссылку</label>
            <input type="text" 
                class="form-control mb-2" 
                name="url" 
                placeholder="url" 
                id="url" 
                required
            >    
            
            <input type="hidden" name="customer_id" value="<?=$_SESSION['user_id'] ?>">
            
            <button type="submit" 
                class="btn btn-danger my-5" 
                id="createOffer" 
                name="create">
                    Создать
            </button>
            <input type="reset" class="btn btn-outline-danger mx-3" value="Очистить форму">
        </form>
    </div> 

</div>
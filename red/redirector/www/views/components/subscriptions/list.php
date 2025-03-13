<div class="my-5"> 
        <h4 class="my-3 textalign-left color-brown" id="offers">Доступные офферы</h4>  


        <table class="table table-striped table-hover" id="offerList">
            <thead>
                <tr>                        
                    <th scope="col"></th>
                    <th scope="col">Наименование</th>                    
                    <th scope="col">Категория</th>  
                    <th scope="col">Стоимость</th>  
                    
                </tr>
            </thead>
            <tbody>
                
                <?php 

                $offers = $payload['offers'] ?? null; 

                 //print_r($offers);
                // exit();
                
                if (isset($offers)) : ?>

                <?php                     
                foreach($offers as $offer) : ?> 
                    
                    <tr>                           
                        <td>
                            <input type="checkbox">
                        </td>                        
                        <td>
                            <a href="#" id="offerName"> 
                                <?=$offer->name ?>
                            </a>                                    
                        </td>
                        <td>

                            <?=$offer->category['categoryName']?>

                        </td>
                        <td>

                            <?=$offer->price?>

                        </td>
                        
                        <td>
                            <div class="d-flex justify-content-end" >
                                <button type="button" class="btn btn-light px-5" style="color: #a61818">
                                    Подписаться
                                </button>
                            </div>
                        </td>
                                                
                                                 
                    </tr>                       
                <?php endforeach ?>
                <?php endif ?>
            </tbody>                
        </table>
        

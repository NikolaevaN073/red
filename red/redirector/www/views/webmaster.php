<?php

// echo '<pre>';

// print_r($payload);

// echo '</pre>';

?>

<div class="container my-5" id="pageBegin"> 

        <div class="d-flex justify-content-end">
        <a href="/webmaster/list" class="btn btn-danger px-5 mx-3" type="submit">Доступные офферы</a> 
            <a href="#Statistic" class="btn btn-danger px-5 mx-3" type="submit">Статистика</a>    
            <a href="/logout" class="btn btn-outline-danger px-5 mx-3" type="submit">Выход</a>           
        </div>

                     
        
    <div class="my-5"> 
        <h4 class="my-3 textalign-left color-brown" id="MySubscriptions">Мои подписки</h4>  


        <table class="table table-striped table-hover" id="subscribeList">
            <thead>
                <tr>                        
                    <th scope="col"></th>
                    <th scope="col">Наименование</th>                    
                    <th scope="col">Ссылка</th>  
                    
                </tr>
            </thead>
            <tbody>
                
                <?php 

                $subscriptions = $payload['subscriptions'] ?? null; 

                                
                if (isset($subscriptions)) : ?>

                <?php                     
                foreach($subscriptions as $subscription) : ?> 
                    
                    <tr>                           
                        <td>
                            <input type="checkbox">
                        </td>                        
                        <td>
                            <!-- popup -->
                            <a href="#" id="subscriptionName"> 
                                <?=$subscription['name']?>
                            </a>                                    
                        </td>
                        <td>
                            <p id="subscribeLink"><?php 

                            echo $subscription['url']
                            
                            ?></p>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end" >
                                <button type="button" class="btn btn-light px-5" style="color: #a61818">
                                    Отписаться
                                </button>
                            </div>
                        </td>
                                                
                                                 
                    </tr>                       
                <?php endforeach ?>
                <?php endif ?>
            </tbody>                
        </table>
        



    </div>   

    <div class="my-5"> 
        <h4 class="my-3 textalign-left color-brown" id="oldSubscriptions">Архив</h4>  


        <table class="table table-striped table-hover" id="oldSubscriptionsList">
            <thead>
                <tr>                        
                    <th scope="col"></th>
                    <th scope="col">Наименование</th>                    
                    <th scope="col"></th>  
                    
                </tr>
            </thead>
            <tbody>
                
                <?php 
                $offers = $payload['offers']['archived'] ?? null; 
                if (isset($offers)) : ?>

                <?php    
                
                foreach($offers as $offer) : ?> 
                    <tr >    
                        <td>
                            <input type="checkbox">
                        </td>                        
                        <td>
                            <a href="/customer/edit/<?=$offer['id']?>" 
                                id="offerName"
                                data-offer-id = "<?=$offer['id'] ?>"    
                            >                                 
                                <?=$offer['name']?>
                            </a>                                    
                        </td>                        
                        <td>
                            <p id="offerInUse"><?php 

                            echo 0;
                            
                            //echo $offer['count_of_a'] ?? 0; 
                            
                            ?></p>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end" >
                                <button type="button" class="btn btn-light px-3" style="color: #a61818">
                                    Активировать
                                </button>
                            </div>
                        </td>                                                   
                                                 
                    </tr>                       
                <?php endforeach ?>
                <?php endif ?>
            </tbody>                
        </table>
        



    </div>   


    <div>
        <h4 class="my-5 textalign-left color-brown" id="Statistic">
            Статистика
        </h4>   
    </div>

    <div class="col-sm-7">        
        <h5 class="my-3 textalign-left color-brown">
            Выберите оффер и статистику за день, за месяц, или за год
        </h5>

        <form method="post" id="formStatisticCustomer">
            <label for="offer" class="form-label">Выберите оффер</label>
            <select class="form-select" aria-label="Default select" name="customerStatistic" required>                
                <option selected></option>
                
                





            </select>
            
            <label for="day" class="form-label my-3">Статистика за один день. Выберите день</label>
            <input type="date" class="form-control" id="date" name="day" placeholder="Дата">

            <label for="month" class="form-label my-3">Статистика за один месяц. Выберите месяц</label>            
            <select class="form-select" aria-label="Default select" name="month">
                <option selected></option>
                <option value="2023-01-01/2023-01-31">Январь</option>
                <option value="2023-02-01/2023-02-28">Февраль</option>
                <option value="2023-03-01/2023-03-31">Март</option>
                <option value="2023-04-01/2023-04-30">Апрель</option>
                <option value="2023-05-01/2023-05-31">Май</option>
                <option value="2023-06-01/2023-06-30">Июнь</option>
                <option value="2023-07-01/2023-07-31">Июль</option>
                <option value="2023-08-01/2023-08-31">Август</option>
                <option value="2023-09-01/2023-09-30">Сентябрь</option>
                <option value="2023-10-01/2023-10-31">Октябрь</option>
                <option value="2023-11-01/2023-11-30">Ноябрь</option>
                <option value="2023-12-01/2023-12-31">Декабрь</option>
            </select>    

            <label for="year" class="form-label my-3">Статистика за один год. Выберите год</label> 
            <select class="form-select" aria-label="Default select" name="year">
                <option selected></option>
                <option value="2023-01-01/2023-12-31">2023</option>                            
            </select>               
            
            <button type="submit" 
                class="btn btn-danger my-5" 
                id="statisticToShow"
                name="submit">
                    Показать
            </button>            
        </form>
    </div>              
    </div>
        <div class="d-flex justify-content-end">  
            
            <a class="btn btn-secondary btn-block m-3"  href="#pageBegin" role="button">Наверх</a>   
        </div>
    </div>     
   





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous">
</script>
<script src="public/js/createOffer.js"></script>
<script src="public/js/changeStatusOffer.js"></script>
<script src="public/js/statisticCustomer.js"></script>

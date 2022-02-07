    <?php include 'header.php'; ?>
           
        <div class="produto-list small-11 large-12 columns no-padding small-centered">
            
            <div class="global-page-container">
                <div class="produtos-title small-12 columns no-padding">
                    <h3>Cardápio</h3>
                    <hr></hr>
                </div>
                        <?php

                            $server = 'localhost';
                            $user = 'root';
                            $password = '';
                            $db_name = 'bd_harpos';
                            $port = '3306';

                            $db_connect = new mysqli($server,$user,$password,$db_name,$port);
                            mysqli_set_charset($db_connect,"utf8");

                            if ($db_connect->connect_error) {
                                echo 'Falha: ' . $db_connect->connect_error;
                            } else {
                                
                               $sql =  "SELECT DISTINCT categoria FROM restaurante";

                                $result = $db_connect->query($sql);

                                if ($result->affected_rows > 0) {

                                    while ($row = $result->fetch_assoc()) { 
                                          
                                        $categoria = $row['categoria']; ?>

                                        <div class="category-slider small-12 columns no-padding">
                                        <h4><?php echo $categoria; ?></h4>

                                                <div class="slider-cardapio">
                                                <div class="slider-002 small-12 small-centered columns">

                                                   <?php 
                                                        $sql2 = "SELECT * FROM restaurante WHERE categoria='$categoria'";
                                                        $result2 = $db_connect->query($sql2);

                                                        if ($result2->num_rows > 0) {

                                                            while ($row2 = $result2->fetch_assoc()) { ?>                                 
                                                                      
                                                                <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                                                <div class="cardapio-item">
                                                                    <a href="prato.php?prato=<?php echo $row2['codigo']; ?>">
                                                                            
                                                                        <div class="item-image"> 
                                                                            <img src="img/cardapio/<?php echo $row2['nomeimagem']; ?>" alt="cogumelos"/>   
                                                                        </div>

                                                                        <div class="item-info">
                                                                                
                                                                            
                                                                            <div class="title"><?php echo $row2['nome']; ?></div>
                                                                        </div>

                                                                        <div class="gradient-filter">
                                                                        </div>    
                                                                    </a>
                                                                </div>
                                                                </div>  


                                                            <?php }
                                                        }
                                                        
                                                    ?>
                                                       
                                                </div>
                                            </div>
                                        </div>

                                    <?php }  
                                        
                                } else {
                                    echo 'Não há itens';
                                }    
                            }

                        ?> 

            </div> 
        </div>       

    <?php include 'footer.php'; ?>       

   


        
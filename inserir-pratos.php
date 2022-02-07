     <?php

        $pratos = array (

            array (
                'codigo' => 'jardim-cogumelos',
                'nome' => 'Jardim de Cogumelos',
                'categoria' => 'Entradas',
                'descr' => 'Nossa especialidade.',
                'preco' => 12.00,
                'calorias' => 290,
                'destaque' => 0,
                'nomeimagem' => 'jardim-cogumelos.jpg',
                'prato' => 'prato1.jpng'

            ),

            array (
                'codigo' => 'camarao-alho',
                'nome' => 'Camarões Ao Alho',
                'categoria' => 'Entradas',
                'descr' => 'Nossa especialidade.',
                'preco' => 16.00,
                'calorias' => 340,
                'destaque' => 1,
                'nomeimagem' => 'camarao-alho.jpg'

            ),

            array (
                'codigo' => 'salada-grega',
                'nome' => 'Salada Grega',
                'categoria' => 'Entradas',
                'descr' => 'Nossa especialidade.',
                'preco' => 11.00,
                'calorias' => 180,
                'destaque' => 0,
                'nomeimagem' => 'salada-grega.jpg'

            ),

            array (
                'codigo' => 'brie-geleia',
                'nome' => 'Tapas de Queijo Brie e Geleia',
                'categoria' => 'Entradas',
                'descr' => 'Nossa especialidade.',
                'preco' => 14.00,
                'calorias' => 400,
                'destaque' => 0,
                'nomeimagem' => 'brie-geleia.jpg'

            ),

            array (
                'codigo' => 'picanha-brasileira',
                'nome' => 'Picanha à Brasileira',
                'categoria' => 'Pratos Principais',
                'descr' => 'Nossa especialidade.',
                'preco' => 28.00,
                'calorias' => 890,
                'destaque' => 1,
                'nomeimagem' => 'picanha-brasileira.jpg'

            ),

             array (
                'codigo' => 'costelinha',
                'nome' => 'Costelinha de Porco',
                'categoria' => 'Pratos Principais',
                'descr' => 'Nossa especialidade.',
                'preco' => 29.00,
                'calorias' => 930,
                'destaque' => 0,
                'nomeimagem' => 'costelinha.jpg'

            ),

            array (
                'codigo' => 'salmao-legumes',
                'nome' => 'Salmão Aos Legumes',
                'categoria' => 'Pratos Principais',
                'descr' => 'Nossa especialidade.',
                'preco' => 29.00,
                'calorias' => 690,
                'destaque' => 1,
                'nomeimagem' => 'salmao-legumes.jpg'

            ),

            array (
                'codigo' => 'churrasco-misto',
                'nome' => 'Churrasco Misto',
                'categoria' => 'Pratos Principais',
                'descr' => 'Nossa especialidade.',
                'preco' => 26.00,
                'calorias' => 700,
                'destaque' => 0,
                'nomeimagem' => 'churrasco-misto.jpg'

            ),

            array (
                'codigo' => 'cheesecake-cereja',
                'nome' => 'Cheese Cake de Cereja',
                'categoria' => 'Sobremesas',
                'descr' => 'Nossa especialidade.',
                'preco' => 16.00,
                'calorias' => 680,
                'destaque' => 1,
                'nomeimagem' => 'cheesecake-cereja.jpg'

            ),

            array (
                'codigo' => 'flan-frutas-vermelhas',
                'nome' => 'Flan de Frutas Vermelhas',
                'categoria' => 'Sobremesas',
                'descr' => 'Nossa especialidade.',
                'preco' => 14.00,
                'calorias' => 620,
                'destaque' => 0,
                'nomeimagem' => 'flan-frutas-vermelhas.jpg'

            ),

            array (
                'codigo' => 'petit-gateau',
                'nome' => 'Petit Gateau',
                'categoria' => 'Sobremesas',
                'descr' => 'Nossa especialidade',
                'preco' => 19.00,
                'calorias' => 720,
                'destaque' => 0,
                'nomeimagem' => 'petit-gateau.jpg'

            ),

            array (
                'codigo' => 'acai',
                'nome' => 'Açai',
                'categoria' => 'Sobremesas',
                'descr' => 'Nossa especialidade.',
                'preco' => 15.00,
                'calorias' => 520,
                'destaque' => 0,
                'nomeimagem' => 'acai.jpg'

            )
        );

    ?>

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
            echo 'Conexão feita com sucesso' . '<br><br>';

            foreach ($pratos as $prato) {
                
                $codigo =$prato['codigo'];
                $nome =$prato['nome'];
                $categoria =$prato['categoria'];
                $descricao =$prato['descr'];
                $preco =$prato['preco'];
                $calorias =$prato['calorias'];
                $destaque =$prato['destaque'];
                $imagem =$prato['nomeimagem'];

                $sql = "INSERT INTO restaurante(codigo,nome,categoria,descr,preco,calorias,destaque,nomeimagem) VALUES ('$codigo', '$nome', '$categoria', '$descr', $preco, $calorias, $destaque, '$nomeimagem')";

                if ($db_connect->query($sql)) {
                    echo $nome . "inserido com sucesso" . '<br><br>';

                } else {
                    echo "Não foi possível inserir " . $nome . '<br>';
                    echo mysqli_error($db_connect) . '<br><br>';
                }
                
                echo '<br>';
            }

        }

    ?>
    
    ?>   

    
/** @noinspection ALL */<?php include 'header.php'; ?>

<div class="product-page small-11 large-12 columns no-padding small-centered">

    <div class="global-page-container">

        <?php

        $cod_prato = $_GET['prato'];

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'bd_harpos';
        $port = '3307';

        $db_connect = new mysqli($server,$user,$password,$db_name,$port);
        mysqli_set_charset($db_connect,"utf8");

        if ($db_connect->connect_error) {
            echo 'Falha: ' . $db_connect->connect_error;
        } else {

            $sql = "SELECT * FROM cardapio WHERE codigo='$cod_prato'";
            $result = $db_connect->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $prato_nome = $row['nome'];
                    $prato_categoria = $row['categoria'];
                    $prato_descr = $row['descr'];
                    $prato_preco = $row['preco'];
                    $prato_calorias = $row['calorias'];
                }

            }
        }

        ?>

        <?php if ($prato_nome !== NULL) { ?>

            <div class="product-section">
                <div class="product-info small-12 large-5 columns no-padding">
                    <h3><?php echo $prato_nome; ?></h3>
                    <h4><?php echo $prato_categoria; ?></h4>
                    <p><?php echo $prato_descr; ?></p>

                    <h5><b>Preço: </b>R$ <?php echo $prato_preco; ?></h5>
                    <h5><b>Calorias: </b><?php echo $prato_calorias; ?></h5>
                </div>

                <div class="product-picture small-12 large-7 columns no-padding">
                    <img src="img/cardapio/<?php echo $cod_prato; ?>.jpg" alt="Foto do prato: <?php echo $prato_nome; ?>">
                </div>

            </div>
        <?php } else {
            echo 'Prato não encontrado!' . '<br>';
        } ?>

        <div class="go-back small-12 columns no-padding">
            <a href="cardapio.php">Voltar ao Cardápio</a>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

      
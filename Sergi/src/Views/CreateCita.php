<?php require_once("Components/Layout.php"); ?>

<body class="bodyUsuarioEdit">
    <?php require_once("Components/HeaderAdd.php"); ?>
    <main class="mainContainerSelectDate">
        <form action='action=store' method="post">
            <div class="formBoxOneConsulta">
                <input type="text" placeholder="NOMBRE" class="boxName2" />
                <button class="buttonDelete">
                    <img src="./public/img/delete.svg" alt="close" class="imgDelete" />
                </button>
            </div>
            <div class="formBoxTwoConsulta">
                <textarea type="text" name="name" required class="boxConsulta2" id="" cols="30" rows="10" placeholder="CONSULTA"></textarea>
            </div>
            <div class="btPrincipalTotal">
                <button class="buttonsPrincipals" type="submit" value="Crear">AÑADIR</button>
                <button class="buttonsPrincipals">CONSULTAR</button>
            </div>
        </form>
    </main>




</body>
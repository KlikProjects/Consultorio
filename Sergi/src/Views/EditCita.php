<?php require_once("Components/Layout.php"); ?>

<body class="bodyUsuarioEdit">
    <?php require_once("Components/HeaderAdd.php"); ?>
    <main class="mainContainerSelectDate">
        <form action='action=update&id=<?php echo $data["cita"]->getId() ?>' method="post">

            <main class="mainContainerSelectDate">
                <div class="formBoxOneConsulta">
                    <input type="text" placeholder="NOMBRE" class="boxName2" name="name" required value='<?php echo ($data["cita"]->getNombre()); ?>' />
                    <button class="buttonDelete">
                        <img src="./public/img/delete.svg" alt="close" class="imgDelete" />
                    </button>
                </div>
                <div class="formBoxTwoConsulta">
                    <textarea type="text" name="consulta" class="boxConsulta2" cols="30" rows="10" placeholder="CONSULTA"><?php echo ($data["cita"]->getConsulta()); ?></textarea>
                </div>
                <div class="btPrincipalTotal">
                    <button class="buttonsPrincipals" type="submit">CONFIRMAR</button>
                    <button class="buttonsPrincipals">VOLVER</button>
                </div>
            </main>


        </form>
    </main>

</body>

</html>
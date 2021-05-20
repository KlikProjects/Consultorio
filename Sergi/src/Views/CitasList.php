<?php require_once("Components/Layout.php"); ?>

<body class="bodyCTO">
    <?php require_once("Components/HeaderCTO.php"); ?>

    <main class="mainContainerAllDate">
        <div class="formBoxComplete">

            <?php
            foreach ($data["citas"] as $cita) {
                echo "
            <div class='formBoxOne'>
                <div class='boxDate_name'>
                    <p class='boxDate txtInput'>
                    {$cita->getFecha()}</p>
                    <p class='boxName txtInput'>{$cita->getNombre()}</p>
                    <p class='boxConsulta'>{$cita->getConsulta()}</p>
                </div>
                <a href='?action=delete&id={$cita->getId()}'>
                <button class='buttonDelete'>
                    <img src='./public/img/delete.svg' alt='close' class='imgDelete' />
                </button>
                </a>
            </div> ";
            } ?>

        </div>
    </main>

</body>

</html>
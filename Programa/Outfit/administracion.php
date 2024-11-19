<?php
require_once 'function.php'
?>
<?php render_template('head2', 'administracion.css'); ?>

<body>
    <div class="sidebar">
        <ul>
            <li class="logo">
                <a href="index.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="text">StyleHub</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="administracion.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="text">Inicio</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="text">Usuario</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="text">Pymes</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="productoPend2.php">
                    <span class="icon"><ion-icon name="checkmark-done-circle-outline"></ion-icon></span>
                    <span class="text">Verificacion de productos</span>
                </a>
            </li>
        </ul>
        <ul>
            <div class="bottom">
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="imgBx">
                                <img src="img/spider.png" alt="">
                            </div>
                        </span>
                        <span class="text">Administrador</span>
                    </a>
                </li>
                <li>
                    <a href="logica/cerrar_sesion.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="text">Cerrar Sesion</span>
                    </a>
                </li>
            </div>
        </ul>
    </div>

    <div class="logoG">
        <img src="img/IconLogo.png" alt="">
        <h3>StyleHub</h3>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
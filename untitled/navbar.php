<nav class="navbar navbar-expand-lg bg-blue">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="vakanties.php">Ga Lekker Reizen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
            <ul class="navbar-nav">
            <!-- Met deze if statement, zeg ik dat alleen de ingelogde mensen het mogen zien   -->
                <?php if(isset($_SESSION['student_id'])){
                    echo'
<li class="nav-item mx-2">
            <a class="nav-link btn bg-light fw-bold orange" href="abort.php">Log Out</a>
                       </li>
                       <li class="nav-item mx-2">
            <a class="nav-link btn bg-light fw-bold orange" href="inschrijvingen.php">Inschrijvingen</a>
                       </li>
        ';}
                ?>
                <!--  in deze if statement, zeg ik dat alleen de admin dit mag zien    -->
                    <?php if($_SESSION['level'] == '2') {
                        echo"
<li class='nav-item mx-2'>
        
        <button type='button' class='btn bg-light h-100 orange fw-bold' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
            Maak Vakantie Aan
        </button>
</li>

        <!-- Dit is een modal, een venster dat open klapt hier kan de admin een nieuwe vakantie aanmaken -->
        <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='staticBackdropLabel'>Maak een vakantie aa</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <form id='login-form' class='form' action='vakantie_maak.php' method='post'>
                            <div class='form-group'>
                                <label class='text-dark'>Titel:</label><br>
                                <input type='text' name='titel'  class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label class='text-dark'>Omschrijving:</label><br>
                                <input type='text' name='omschrijving' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label class='text-dark'>Bestemming:</label><br>
                                <input type='text' name='bestemming'  class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label class='text-dark'>Begin Datum:</label><br>
                                <input type='date' name='begin_datum'  class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label class='text-dark'>Eind Datum:</label><br>
                                <input type='date' name='eind_datum'  class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label class='text-dark'>Maximale Inschrijvingen:</label><br>
                                <input type='number' name='max_inschrijvingen'  class='form-control'>
                            </div>



                    </div>
                    <div class='modal-footer'>
                        <input type='submit' name='submit' class='btn btn-success' value='Maak Vakantie Aan'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

";}
                    ?>
            </ul>
        </div>
    </div>
</nav>

<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="logo login-logo">
                        <a href="/PiePHP/" class="text-logo">
                            MY CINEMA
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Modifier genre</label>
                                <input class="au-input au-input--full" type="text" name="genre" value="<?= $allGenre[0]->nom;?>" placeholder="Entrer le nouveau nom du genre ...">
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Mettre a jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

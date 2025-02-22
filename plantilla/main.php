<body class="text-bg-dark p-3 text-center "> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <section>

        <h1 class="text-center mx-auto p-2" >¿Cual es la siguiente película de Marvel?</h1>
        <div class="text-center">
            <img src="<?=  $poster_url?>" class="rounded img-fluid" width="400" alt="Esta es una imagen del cartel de estreno de la próxima película de Marvel la cual es <?= $data["title"]?>">
        </div>
    </section>

    <hgroup class="text-center">
        <h2 class="mx-auto p-2"><?= $title?> - <?= $until_message?> </h1>
        <p class="text-center  lead h6">Fecha de estreno: <?= $release_date?></p>
        <p  class=" text-center lead h6">La siguinte película es: <?= $following_production["title"]?></p>
    </hgroup>
</body>
<header class="azul-medio padding d-flex flex-column justify-self-start">
    <nav class="p-3">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Aulas
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-0">
                        <div class="list-group list-group-flush" categoria="aulas">
                            <button type="button" arquivo="1508data_hora.php" class="list-group-item list-group-item-action">
                                Aula 15/08
                            </button>
                            <button type="button" arquivo="2208calendario.php" class="list-group-item list-group-item-action">
                                Aula 22/08
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    $(".list-group button").on("click", function(e) {
        $path = $(".list-group").attr("categoria") + "/" + $(e.target).attr("arquivo");
        $("#maincontent").load($path)
    })
</script>
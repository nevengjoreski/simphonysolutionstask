<section>

<!--    BUTTONS START -->
<!--    for initializing the modals mostly-->
    <div class="container mt-5">
        <div class="row">
            <a class="bg-dark btn btn-md btn-block text-white mt-4 col-lg-4 offset-lg-4" data-toggle="modal"
               data-target="#exampleModal"
               data-trigger="not-so-smart">
                <span class="pr-sm-3 pr-xs-0"> Standard Conversion Chart </span>
                <img src="images/dice.png" alt="...">
            </a>
        </div>

        <div class="row">
            <a class="bg-dark btn btn-md btn-block text-white mt-4 col-lg-4 offset-lg-4" data-toggle="modal"
               data-target="#exampleModal"
               data-trigger="smart">
                <img src="images/dice.png" alt="...">
                <span class="pl-sm-3 pl-xs-0"> Smart Conversion Chart </span>
            </a>
        </div>

        <div class="row">
            <a id="legacy_table_btn" class="bg-dark btn btn-lg btn-block text-white mt-4 py-3 col-lg-4 offset-lg-4">
                <span class="pl-sm-3 pl-xs-0"> Toggle Legacy Table </span>
            </a>
        </div>
    </div>

<!--    BUTTONS END -->

<!--    MODAL START    -->
    <div class="container">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">

<!--                    MODAL HEADER START-->
                    <div class="dice"></div>
                    <div class="layer_125"></div>
                    <div class="layer_124"></div>
                    <div class="thank_you">Convert betting odds</div>
                    <div class="cross_btn" data-dismiss="modal"></div>
                    <div class="casinos_copy_2"></div>
<!--    MODAL END START-->

<!--    MODAL BODY START-->
                    <form class="inner_text container mb-5">
                        <div class="form-group row justify-content-center smartModal pt-3">
                            <label for="any_odds" class="col-sm-2 col-form-label col-form-label-sm">Any Odds</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="any_odds">
                            </div>
                        </div>

                        <table class="table table-sm text-center smartModal">
                            <thead>
                            <tr>
                                <th>Fractional Odds (UK)</th>
                                <th>Decimal Odds (EU)</th>
                                <th>Moneyline Odds (USA)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td id="any_fractional_odds_placeholder">&nbsp;</td>
                                <td id="any_decimal_odds_placeholder">&nbsp;</td>
                                <td id="any_moneyline_odds_placeholder">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-row notSoSmartModal pt-3">
                            <div class="form-group col-sm-4 col-4 has-success">
                                <label for="fractional_odds">Fractional Odds<br>(UK)</label>
                                <input type="text" class="form-control odds-input" id="fractional_odds">
                            </div>
                            <div class="form-group col-sm-4 col-4">
                                <label for="decimal_odds">Decimal Odds<br>(EU)</label>
                                <input type="text" class="form-control odds-input" id="decimal_odds">
                            </div>
                            <div class="form-group col-sm-4 col-4">
                                <label for="moneyline_odds">Moneyline Odds<br>(USA)</label>
                                <input type="text" class="form-control odds-input" id="moneyline_odds">
                            </div>
                        </div>

                    </form>

<!--     MODAL BODY END-->

<!--    SECOND MODAL TABLE START -->
                    <div class="mt-5 card classChange">

                        <div class="row smartModal">
                            <div class="col-1" style=" left:10px;"></div>
                            <h2 class="col-10 card-header text-center text-white align-bottom custom_header"> Odds Conversion Chart</h2>
                            <div class="col-1" style=" left:-10px;"></div>
                        </div>

                        <div class="card-body">

                            <table id="odd_conversion_chart_table"
                                   class="table table-sm table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>Fractional Odds (UK)</th>
                                    <th>Decimal Odds (EU)</th>
                                    <th>Moneyline Odds (USA)</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
<!--    SECOND MODAL TABLE END -->

<!--                    This is needed because of the absolute parts of the modal (table is not showing whole)-->
                    <div style="height: 500px"></div>
                </div>
            </div>
        </div>
    </div>

<!--    MODAL END    -->

<!--    OFFLINE BUTTON    -->
    <button class="btn btn-outline-danger btn-block offline_btn mx-auto d-none">
        <span class="dot"></span> Offline
    </button>

</section>

<!--    LEGACY TABLE START -->
<section>
    <div id="legacy_table" class=" legacy_table container text-center mt-5 bg-dark pb-5 p-sm-5">
        <h3 class="text-white py-3">Legacy Table</h3>
        <img class="img-thumbnail" src="images/legacy_table.png" alt="">
    </div>
</section>
<!--    LEGACY TABLE END -->


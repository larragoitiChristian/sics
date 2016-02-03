

<div class="ui bottom attached tab segment" data-tab="second">
    <h1 align="center">Buscar Beneficiario de Oportunidades</h1>
    <div class="ui four column doubling stackable grid container" align="center">
        <div class="row">
            <div class="column">
                <div class="ui radio checkbox">
                    <input type="radio" name="check" id="check" value="1" checked="checked" onchange="javascript:showContent()">
                    <label>Por Nombre</label>
                </div>
            </div>
            <div class="column">
                <div class="ui radio checkbox">
                    <input type="radio" name="check" id="check" value="2" onchange="javascript:showContent()">
                    <label>Por Folio</label>
                </div>
            </div>
        </div>
    </div>
    <p></p>
    <p></p>


    <div class="ui container">
        <div class="row">
            <form id="form" method="GET" action="<?=base_url()?>index.php/buscaBeneficiario/buscarBeneficiario" >
                <div class="column"  style="display: block;" id="content">

                    <div class="ui action input" >
                        <input type="text" placeholder="Nombre..." id="query" name="query">
                        <button class="ui icon button" type="submit" id="buscar">
                            <i class="search icon"></i>
                        </button>
                    </div>

                </div>
                <div class="column" style="display: none;" id="content2">

                    <div class="ui action input" >
                        <input type="text" placeholder="Folio..." id="query2" name="query2">
                        <button class="ui icon button" type="submit" id="buscar">
                            <i class="search icon"></i>
                        </button>
                    </div>
            </form>
        </div>
    </div>
    <p></p>
    <p></p>
</div>
<div class="ui center aligned container">
    <div class="row">
        <div class="column">
            <div id="tblDatos"> </div>
        </div>
    </div>

</div>
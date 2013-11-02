<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
     <script type="text/javascript">
            dojo.require("dijit.form.Slider");
            dojo.require("dijit.form.HorizontalRule");
            dojo.addOnLoad(function() {
            <?php if($nombre_sintoma != 'TOS' AND $nombre_sintoma != 'DIARREA'){ ?>
                var horizontal_nivel = dojo.byId("<?php echo $nombre_sintoma.'_'; ?>nivel");

                var rulesNode_nivel = document.createElement('div');
                horizontal_nivel.appendChild(rulesNode_nivel);
                var sliderRules_nivel = new dijit.form.HorizontalRule({count:<?php echo ($nivel['MAXIMO']-$nivel['MINIMO']+1); ?>,style:"height:0.5em",container:"bottomDecoration"},rulesNode_nivel);
                
                var rulesNodeLabels_niveles = document.createElement('div');
                horizontal_nivel.appendChild(rulesNodeLabels_niveles);
                var sliderRulesLabels_nivel = new dijit.form.HorizontalRuleLabels({count:<?php echo $nivel['N_ETIQUETAS'] ?>3,style:"height:1.2em;font-size:75%;color:gray;",labels:[<?php echo $nivel['ETIQUETAS']; ?>]},rulesNodeLabels_niveles)

                    var <?php echo $nombre_sintoma.'_'; ?>nivel = new dijit.form.HorizontalSlider({
                    name: "<?php echo $nombre_sintoma.'_'; ?>nivel",
                    value: <?php echo $nivel['MINIMO']; ?>,
                    minimum: <?php echo $nivel['MINIMO']; ?>,
                    maximum: <?php echo $nivel['MAXIMO']; ?>,
                    discreteValues: <?php echo ($nivel['MAXIMO']-$nivel['MINIMO']+1); ?>,
                    intermediateChanges: true,
                    style: "height:30px;width:400px; margin-left: 30px; margin-top: 20px;",
                    showButtons:false,
                    onChange: function(value) {
                        dojo.byId("<?php echo $nombre_sintoma.'_'; ?>nivelValue").value = value;
                    }
                },
                "<?php echo $nombre_sintoma.'_'; ?>nivel");
            <?php } ?>
            <?php if($nombre_sintoma != 'TOS' AND $nombre_sintoma != 'DIARREA' AND $nombre_sintoma != 'FIEBRE'){ ?>

                var horizontal_duracion = dojo.byId("<?php echo $nombre_sintoma.'_'; ?>duracion");

                var rulesNode_duracion = document.createElement('div');
                horizontal_duracion.appendChild(rulesNode_duracion);
                var sliderRules_duracion = new dijit.form.HorizontalRule({count:8,style:"height:0.5em;"},rulesNode_duracion);

                var rulesNodeLabels_duraciones = document.createElement('div');
                horizontal_duracion.appendChild(rulesNodeLabels_duraciones);
                var sliderRulesLabels_duracion = new dijit.form.HorizontalRuleLabels({count:8,container:"topDecoration",style:"height:1.2em;font-size:75%;color:gray;",labels:['Poco','','10','','Más o menos','','30','Mucho']},rulesNodeLabels_duraciones);

                var <?php echo $nombre_sintoma.'_'; ?>duracion = new dijit.form.HorizontalSlider({
                    name: "<?php echo $nombre_sintoma.'_'; ?>duracion",
                    value: 1,
                    minimum: 1,
                    maximum: 35,
                    discreteValues: 35,
                    intermediateChanges: true,
                    style: "height:10px;width:400px; margin-left: 30px; margin-top: 20px;",
                    showButtons:false,
                    onChange: function(value) {
                        dojo.byId("<?php echo $nombre_sintoma.'_'; ?>duracionValue").value = value;
                    }
                },
                "<?php echo $nombre_sintoma.'_'; ?>duracion");
            <?php } ?>
                var horizontal_inicio = dojo.byId("<?php echo $nombre_sintoma.'_'; ?>inicio");

                var rulesNode_inicio = document.createElement('div');
                horizontal_inicio.appendChild(rulesNode_inicio);
                var sliderRules_inicio = new dijit.form.HorizontalRule({count:10,style:"height:0.5em;"},rulesNode_inicio);

                var rulesNodeLabels_inicio = document.createElement('div');
                horizontal_inicio.appendChild(rulesNodeLabels_inicio);
                var sliderRulesLabels_inicio = new dijit.form.HorizontalRuleLabels({count:10,container:"topDecoration",style:"height:1.2em;font-size:75%;color:gray;",labels:['1 hora','Hace poco','Ayer','','Más o menos',' ',' ','Hace 3 dias','','Hace mucho']},rulesNodeLabels_inicio);
  

                    var <?php echo $nombre_sintoma.'_'; ?>inicio = new dijit.form.HorizontalSlider({
                    name: "<?php echo $nombre_sintoma.'_'; ?>inicio",
                    value: 1,
                    minimum: 1,
                    maximum: 100,
                    discreteValues: 100,
                    intermediateChanges: true,
                    style: "height:10px;width:400px; margin-left: 30px; margin-top: 20px;",
                    showButtons:false,
                    onChange: function(value) {
                        dojo.byId("<?php echo $nombre_sintoma.'_'; ?>inicioValue").value = value;
                    }
                },
                "<?php echo $nombre_sintoma.'_'; ?>inicio");
            <?php if($nombre_sintoma != 'TOS' ){ ?>
                var horizontal_repeticion = dojo.byId("<?php echo $nombre_sintoma.'_'; ?>repeticion");

                var rulesNode_repeticion = document.createElement('div');
                horizontal_repeticion.appendChild(rulesNode_repeticion);
                var sliderRules_repeticion = new dijit.form.HorizontalRule({count:15,style:"height:0.5em;"},rulesNode_repeticion);

                var rulesNodeLabels_repeticion = document.createElement('div');
                horizontal_repeticion.appendChild(rulesNodeLabels_repeticion);
                var sliderRulesLabels_repeticion = new dijit.form.HorizontalRuleLabels({count:5,container:"topDecoration",style:"height:1.2em;font-size:75%;color:gray;",labels:['1 vez','4','Más o menos','11','Mucho']},rulesNodeLabels_repeticion);


                    var <?php echo $nombre_sintoma.'_'; ?>repeticion = new dijit.form.HorizontalSlider({
                    name: "<?php echo $nombre_sintoma.'_'; ?>repeticion",
                    value: 1,
                    minimum: 1,
                    maximum: 15,
                    discreteValues: 15,
                    intermediateChanges: true,
                    style: "width:400px; margin-left: 30px; margin-top: 20px;",
                    showButtons:false,
                    onChange: function(value) {
                        dojo.byId("<?php echo $nombre_sintoma.'_'; ?>repeticionValue").value = value;
                    }
                },
                "<?php echo $nombre_sintoma.'_'; ?>repeticion");
           <?php } ?>
        });
        </script>
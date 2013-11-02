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
                
                var <?php echo 'horizontal'.$constante; ?> = dojo.byId("<?php echo $constante; ?>");

                var rulesNode_nivel = document.createElement('div');
                <?php echo 'horizontal'.$constante; ?>.appendChild(rulesNode_nivel);
                var sliderRules_nivel = new dijit.form.HorizontalRule({count:<?php if (($nivel['MAXIMO']-$nivel['MINIMO']+1)>=60){echo (($nivel['MAXIMO']-$nivel['MINIMO']+1) / (5));}else{ echo ($nivel['MAXIMO']-$nivel['MINIMO']+1);} ?>,style:"height:0.5em",container:"bottomDecoration"},rulesNode_nivel);

                var rulesNodeLabels_niveles = document.createElement('div');
                <?php echo 'horizontal'.$constante; ?>.appendChild(rulesNodeLabels_niveles);
                var sliderRulesLabels_nivel = new dijit.form.HorizontalRuleLabels({count:<?php echo $nivel['N_ETIQUETAS'] ?>3,style:"height:1.2em;font-size:75%;color:gray;",labels:[<?php echo $nivel['ETIQUETAS']; ?>]},rulesNodeLabels_niveles)

                    var <?php echo $constante; ?> = new dijit.form.HorizontalSlider({
                    name: "<?php echo $constante; ?>",
                    value: <?php echo $nivel['NORMAL']; ?>,
                    minimum: <?php echo $nivel['MINIMO']; ?>,
                    maximum: <?php echo $nivel['MAXIMO']; ?>,
                    discreteValues: <?php echo ($nivel['MAXIMO']-$nivel['MINIMO']+1); ?>,
                    intermediateChanges: true,
                    style: "height:30px;width:450px; margin-left: 30px; margin-top: 20px;",
                    showButtons:false,
                    onChange: function(value) {
                        dojo.byId("<?php echo $constante; ?>Value").value = value;
                    }
                },
                "<?php echo $constante; ?>");
        });
        </script>
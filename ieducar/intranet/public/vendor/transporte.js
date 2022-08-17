if ($j("#transporte_rota").length > 0) {
  $j("#transporte_rota").on("change", function () {
    chamaGetPonto();
  });

  function chamaGetPonto() {
    var campoRota = $j("#transporte_rota").val();
    var campoPonto = document.getElementById("transporte_ponto");

    if (campoRota == "") {
      campoPonto.length = 1;
      campoPonto.options[0].text = "Selecione uma rota acima";
    } else {
      campoPonto.length = 1;
      campoPonto.disabled = true;
      campoPonto.options[0].text = "Carregando pontos...";

      var xml_ponto = new ajax(getPonto);
      xml_ponto.envia("ponto_xml.php?rota=" + campoRota);
    }
  }

  function getPonto(xml_ponto) {
    var campoPonto = document.getElementById("transporte_ponto");
    var DOM_array = xml_ponto.getElementsByTagName("ponto");

    if (DOM_array.length) {
      campoPonto.length = 1;
      campoPonto.options[0].text = "Selecione um ponto";
      campoPonto.disabled = false;

      for (var i = 0; i < DOM_array.length; i++) {
        campoPonto.options[campoPonto.options.length] = new Option(
          DOM_array[i].firstChild.data,
          DOM_array[i].getAttribute("cod_ponto"),
          false,
          false
        );
      }

      $j("#transporte_ponto").val(valPonto);
    } else {
      campoPonto.options[0].text = "Rota sem pontos";
    }
  }
}

if ($j("#transporte_rota").length > 0) {
  valPonto = $j("#transporte_ponto_value").val();
  chamaGetPonto();
}

if ($j("#pessoaj_transporte_destino_value").val()) {
  let name = $j("#pessoaj_transporte_destino_value").val().replaceAll('+',' ');
  $j("#pessoaj_transporte_destino").val(name);
}

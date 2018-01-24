<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="ISO-8859-1">
<link type="text/css" rel="stylesheet" href="resources/css/style.css" />

  <!-- Test code
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="application/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="application/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" type="application/javascript"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="application/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" type="application/javascript"></script>


<script>
window.onload = function test() {

  var input = document.getElementById("fornavn");

input.onblur = function() {
  if (!input.value.includes('@')) { // not email
    input.classList.add('invalid');
    fornavn.innerHTML = 'Please enter a correct email.'
  }
};

input.onfocus = function() {
  if (this.classList.contains('invalid')) {
    // remove the "error" indication, because the user wants to re-enter something
    this.classList.remove('invalid');
    fornavn.innerHTML = "";
  }
};
}
</script>


  <script type="text/javascript" language="javascript">
/*
  document.addEventListener("click", function() {
      var elements = document.getElementsByName("fornavn");
      for (var i = 0; i < elements.length; i++) {
          elements[i].oninvalid = function(e) {
              e.target.setCustomValidity("");
              if (!e.target.validity.valid) {
                  e.target.setCustomValidity("Amund er Awesome");
              }
          };
          elements[i].oninput = function(e) {
              e.target.setCustomValidity("");
          };
      }
  })
*/

  //
  // if(document.addEventListener){
  //     document.addEventListener('invalid', function(e){
  //         e.target.className += ' invalid';
  //     }, true);
  // }

  </script>

  <script type="text/javascript" language="javascript" src ="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script>
  $( document ).ready(function() {
     $("input[name=postnummer]").keyup("change", function () {
          $this = $(this);
          /*https://api.bring.com/shippingguide/api/postalCode.html?clientUrl=localhost/postnummer/ajax2.html&pnr="*/
          $.getJSON("https://fraktguide.bring.no/fraktguide/api/postalCode.json?country=no&pnr=" + $(this).val() + "&callback=?",
  		function (json) {
              $("input[name=poststed]").val((json.result));
            //  $("input[name=pnr]").val((json.result));
          });
      });
  });
  </script>

  <title>Registreringsskjema</title>
</head>

<body>

  <?php
  if (isset($_REQUEST['submit'])) {
   $xml = new DOMDocument("1.0","UTF-8");
   $xml->load("a.xml");

   $rootTag = $xml->getElementsByTagName("document")->item(0);

   $dataTag = $xml->createElement("data");

   $genderTag = $xml->createElement("gender",$_REQUEST['gender']);
   $fornavnTag = $xml->createElement("fornavn",$_REQUEST['fornavn']);
   $etternavnTag = $xml->createElement("etternavn",$_REQUEST['etternavn']);
   $personnummerTag = $xml->createElement("personnummer",$_REQUEST['personnummer']);
   $adresseTag = $xml->createElement("adresse",$_REQUEST['adresse']);
   $pnrTag = $xml->createElement("pnr",$_REQUEST['pnr']);
   $poststedTag = $xml->createElement("poststed",$_REQUEST['poststed']);
   $kommuneTag = $xml->createElement("kommune",$_REQUEST['kommune']);
   $telefonnummerTag = $xml->createElement("telefonnummer",$_REQUEST['telefonnummer']);
   $epostTag = $xml->createElement("epost",$_REQUEST['epost']);
   $bankkontonummerTag = $xml->createElement("bankkontonummer",$_REQUEST['bankkontonummer']);
   $statsborgerskapTag = $xml->createElement("statsborgerskap",$_REQUEST['statsborgerskap']);
   $noknavnTag = $xml->createElement("nok-navn",$_REQUEST['nok-navn']);
   $nokrelasjonTag = $xml->createElement("nok-relasjon",$_REQUEST['nok-relasjon']);
   $noktelefonTag = $xml->createElement("nok-telefon",$_REQUEST['nok-telefon']);
   $biarbeidsgiverTag = $xml->createElement("biarbeidsgiver",$_REQUEST['biarbeidsgiver']);
   $skoTag = $xml->createElement("sko",$_REQUEST['sko']);
   $tskjorteTag = $xml->createElement("tskjorte",$_REQUEST['tskjorte']);
   $genserTag = $xml->createElement("genser",$_REQUEST['genser']);
   $jakkeTag = $xml->createElement("jakke",$_REQUEST['jakke']);
   $bukseTag = $xml->createElement("bukse",$_REQUEST['bukse']);
   $firmabilTag = $xml->createElement("firmabil",$_REQUEST['firmabil']);
   $mobilaboTag = $xml->createElement("mobilabo",$_REQUEST['mobilabo']);
   $pcTag = $xml->createElement("pc",$_REQUEST['pc']);




   $dataTag->appendChild($genderTag);
   $dataTag->appendChild($fornavnTag);
   $dataTag->appendChild($etternavnTag);
   $dataTag->appendChild($personnummerTag);
   $dataTag->appendChild($adresseTag);
   $dataTag->appendChild($pnrTag);
   $dataTag->appendChild($poststedTag);
   $dataTag->appendChild($kommuneTag);
   $dataTag->appendChild($telefonnummerTag);
   $dataTag->appendChild($epostTag);
   $dataTag->appendChild($bankkontonummerTag);
   $dataTag->appendChild($statsborgerskapTag);
   $dataTag->appendChild($noknavnTag);
   $dataTag->appendChild($nokrelasjonTag);
   $dataTag->appendChild($noktelefonTag);
   $dataTag->appendChild($biarbeidsgiverTag);
   $dataTag->appendChild($skoTag);
   $dataTag->appendChild($tskjorteTag);
   $dataTag->appendChild($genserTag);
   $dataTag->appendChild($jakkeTag);
   $dataTag->appendChild($bukseTag);
   $dataTag->appendChild($firmabilTag);
   $dataTag->appendChild($mobilaboTag);
   $dataTag->appendChild($pcTag);

   $rootTag->appendChild($dataTag);

   $xml->save("a.xml");
  }
  ?>



  <div class="logo">
    <img src="resources/images/logo.svg" alt="Digital HR Logo" id="logo">
  </div>

  <div class="content">
    <div class="form">

      <fieldset>
        <div>
          <img src="resources/images/personalialogo.svg" alt="Personalia Logo" id="personalialogo">
          <legend id="personalia">Personalia</legend>
          <hr />
        </div>

        <!--<legend>Personalia</legend>-->
        <form method="post" action="index.php" name="personaliaform" id="personaliaform" onsubmit="return validateForm()">
          <label class="control-label" for="selectbasic">Kjønn</label>
          <select id="selectgender" name="gender" class="form-control" required>
            <option value="mann">Mann</option>
            <option value="kvinne">Kvinne</option>
            <option value="annet">Annet</option>
          </select>


          <label for="form-fornavn">Fornavn</label>
          <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" id="fornavn"
          name="fornavn" placeholder="Fornavn" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-etternavn">Etternavn</label>
          <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" id="etternavn" name="etternavn" placeholder="Etternavn" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-personnummer">Personnummer</label>
          <input type="text" pattern="^[0-9]{11}$" class="form-control" name="personnummer" placeholder="Personnummer" required="true" maxlength="11" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-adresse">Adresse</label>
          <input type="text" pattern="^[a-zA-ZÆØÅæøå0-9 ]+$" class="form-control" name="adresse" placeholder="Adresse" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-postnummer">Postnummer</label>
          <input type="text" pattern="^[0-9]{4}$" id="postnummer" class="form-control" name="postnummer" placeholder="Postnummer" required="true" maxlength="4" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-poststed">Poststed</label>
          <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" name="poststed" placeholder="Poststed" disabled="disabled" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>


          <label for="form-kommune">Kommune</label>
          <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" name="kommune" placeholder="Kommune" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-telefonnummer">Telefonnummer</label>
          <input type="text" pattern="^[0-9\-\+]{8,15}$" class="form-control" name="telefonnummer" placeholder="Telefonnummer" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-telefonnummer">Epostadresse</label>
          <input type="email" class="form-control" id="epost" name="epost" placeholder="epost@adresse.no" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label for="form-bankkonto">Bankkontonummer</label>
          <input type="text" pattern="^[0-9]{11}$" class="form-control" name="bankkontonummer" placeholder="Bankkontonummer" maxlength="11" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>


          <label for="control-label">Statsborgerskap</label>
          <select id="selectbasic" name="statsborgerskap" class="form-control" required>
          	<option value="AF">Afghanistan</option>
          	<option value="AX">Åland Islands</option>
          	<option value="AL">Albania</option>
          	<option value="DZ">Algeria</option>
          	<option value="AS">American Samoa</option>
          	<option value="AD">Andorra</option>
          	<option value="AO">Angola</option>
          	<option value="AI">Anguilla</option>
          	<option value="AQ">Antarctica</option>
          	<option value="AG">Antigua and Barbuda</option>
          	<option value="AR">Argentina</option>
          	<option value="AM">Armenia</option>
          	<option value="AW">Aruba</option>
          	<option value="AU">Australia</option>
          	<option value="AT">Austria</option>
          	<option value="AZ">Azerbaijan</option>
          	<option value="BS">Bahamas</option>
          	<option value="BH">Bahrain</option>
          	<option value="BD">Bangladesh</option>
          	<option value="BB">Barbados</option>
          	<option value="BY">Belarus</option>
          	<option value="BE">Belgium</option>
          	<option value="BZ">Belize</option>
          	<option value="BJ">Benin</option>
          	<option value="BM">Bermuda</option>
          	<option value="BT">Bhutan</option>
          	<option value="BO">Bolivia, Plurinational State of</option>
          	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
          	<option value="BA">Bosnia and Herzegovina</option>
          	<option value="BW">Botswana</option>
          	<option value="BV">Bouvet Island</option>
          	<option value="BR">Brazil</option>
          	<option value="IO">British Indian Ocean Territory</option>
          	<option value="BN">Brunei Darussalam</option>
          	<option value="BG">Bulgaria</option>
          	<option value="BF">Burkina Faso</option>
          	<option value="BI">Burundi</option>
          	<option value="KH">Cambodia</option>
          	<option value="CM">Cameroon</option>
          	<option value="CA">Canada</option>
          	<option value="CV">Cape Verde</option>
          	<option value="KY">Cayman Islands</option>
          	<option value="CF">Central African Republic</option>
          	<option value="TD">Chad</option>
          	<option value="CL">Chile</option>
          	<option value="CN">China</option>
          	<option value="CX">Christmas Island</option>
          	<option value="CC">Cocos (Keeling) Islands</option>
          	<option value="CO">Colombia</option>
          	<option value="KM">Comoros</option>
          	<option value="CG">Congo</option>
          	<option value="CD">Congo, the Democratic Republic of the</option>
          	<option value="CK">Cook Islands</option>
          	<option value="CR">Costa Rica</option>
          	<option value="CI">Côte d'Ivoire</option>
          	<option value="HR">Croatia</option>
          	<option value="CU">Cuba</option>
          	<option value="CW">Curaçao</option>
          	<option value="CY">Cyprus</option>
          	<option value="CZ">Czech Republic</option>
          	<option value="DK">Denmark</option>
          	<option value="DJ">Djibouti</option>
          	<option value="DM">Dominica</option>
          	<option value="DO">Dominican Republic</option>
          	<option value="EC">Ecuador</option>
          	<option value="EG">Egypt</option>
          	<option value="SV">El Salvador</option>
          	<option value="GQ">Equatorial Guinea</option>
          	<option value="ER">Eritrea</option>
          	<option value="EE">Estonia</option>
          	<option value="ET">Ethiopia</option>
          	<option value="FK">Falkland Islands (Malvinas)</option>
          	<option value="FO">Faroe Islands</option>
          	<option value="FJ">Fiji</option>
          	<option value="FI">Finland</option>
          	<option value="FR">France</option>
          	<option value="GF">French Guiana</option>
          	<option value="PF">French Polynesia</option>
          	<option value="TF">French Southern Territories</option>
          	<option value="GA">Gabon</option>
          	<option value="GM">Gambia</option>
          	<option value="GE">Georgia</option>
          	<option value="DE">Germany</option>
          	<option value="GH">Ghana</option>
          	<option value="GI">Gibraltar</option>
          	<option value="GR">Greece</option>
          	<option value="GL">Greenland</option>
          	<option value="GD">Grenada</option>
          	<option value="GP">Guadeloupe</option>
          	<option value="GU">Guam</option>
          	<option value="GT">Guatemala</option>
          	<option value="GG">Guernsey</option>
          	<option value="GN">Guinea</option>
          	<option value="GW">Guinea-Bissau</option>
          	<option value="GY">Guyana</option>
          	<option value="HT">Haiti</option>
          	<option value="HM">Heard Island and McDonald Islands</option>
          	<option value="VA">Holy See (Vatican City State)</option>
          	<option value="HN">Honduras</option>
          	<option value="HK">Hong Kong</option>
          	<option value="HU">Hungary</option>
          	<option value="IS">Iceland</option>
          	<option value="IN">India</option>
          	<option value="ID">Indonesia</option>
          	<option value="IR">Iran, Islamic Republic of</option>
          	<option value="IQ">Iraq</option>
          	<option value="IE">Ireland</option>
          	<option value="IM">Isle of Man</option>
          	<option value="IL">Israel</option>
          	<option value="IT">Italy</option>
          	<option value="JM">Jamaica</option>
          	<option value="JP">Japan</option>
          	<option value="JE">Jersey</option>
          	<option value="JO">Jordan</option>
          	<option value="KZ">Kazakhstan</option>
          	<option value="KE">Kenya</option>
          	<option value="KI">Kiribati</option>
          	<option value="KP">Korea, Democratic People's Republic of</option>
          	<option value="KR">Korea, Republic of</option>
          	<option value="KW">Kuwait</option>
          	<option value="KG">Kyrgyzstan</option>
          	<option value="LA">Lao People's Democratic Republic</option>
          	<option value="LV">Latvia</option>
          	<option value="LB">Lebanon</option>
          	<option value="LS">Lesotho</option>
          	<option value="LR">Liberia</option>
          	<option value="LY">Libya</option>
          	<option value="LI">Liechtenstein</option>
          	<option value="LT">Lithuania</option>
          	<option value="LU">Luxembourg</option>
          	<option value="MO">Macao</option>
          	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
          	<option value="MG">Madagascar</option>
          	<option value="MW">Malawi</option>
          	<option value="MY">Malaysia</option>
          	<option value="MV">Maldives</option>
          	<option value="ML">Mali</option>
          	<option value="MT">Malta</option>
          	<option value="MH">Marshall Islands</option>
          	<option value="MQ">Martinique</option>
          	<option value="MR">Mauritania</option>
          	<option value="MU">Mauritius</option>
          	<option value="YT">Mayotte</option>
          	<option value="MX">Mexico</option>
          	<option value="FM">Micronesia, Federated States of</option>
          	<option value="MD">Moldova, Republic of</option>
          	<option value="MC">Monaco</option>
          	<option value="MN">Mongolia</option>
          	<option value="ME">Montenegro</option>
          	<option value="MS">Montserrat</option>
          	<option value="MA">Morocco</option>
          	<option value="MZ">Mozambique</option>
          	<option value="MM">Myanmar</option>
          	<option value="NA">Namibia</option>
          	<option value="NR">Nauru</option>
          	<option value="NP">Nepal</option>
          	<option value="NL">Netherlands</option>
          	<option value="NC">New Caledonia</option>
          	<option value="NZ">New Zealand</option>
          	<option value="NI">Nicaragua</option>
          	<option value="NE">Niger</option>
          	<option value="NG">Nigeria</option>
          	<option value="NU">Niue</option>
          	<option value="NF">Norfolk Island</option>
          	<option value="MP">Northern Mariana Islands</option>
          	<option value="NO" selected>Norway</option>
          	<option value="OM">Oman</option>
          	<option value="PK">Pakistan</option>
          	<option value="PW">Palau</option>
          	<option value="PS">Palestinian Territory, Occupied</option>
          	<option value="PA">Panama</option>
          	<option value="PG">Papua New Guinea</option>
          	<option value="PY">Paraguay</option>
          	<option value="PE">Peru</option>
          	<option value="PH">Philippines</option>
          	<option value="PN">Pitcairn</option>
          	<option value="PL">Poland</option>
          	<option value="PT">Portugal</option>
          	<option value="PR">Puerto Rico</option>
          	<option value="QA">Qatar</option>
          	<option value="RE">Réunion</option>
          	<option value="RO">Romania</option>
          	<option value="RU">Russian Federation</option>
          	<option value="RW">Rwanda</option>
          	<option value="BL">Saint Barthélemy</option>
          	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
          	<option value="KN">Saint Kitts and Nevis</option>
          	<option value="LC">Saint Lucia</option>
          	<option value="MF">Saint Martin (French part)</option>
          	<option value="PM">Saint Pierre and Miquelon</option>
          	<option value="VC">Saint Vincent and the Grenadines</option>
          	<option value="WS">Samoa</option>
          	<option value="SM">San Marino</option>
          	<option value="ST">Sao Tome and Principe</option>
          	<option value="SA">Saudi Arabia</option>
          	<option value="SN">Senegal</option>
          	<option value="RS">Serbia</option>
          	<option value="SC">Seychelles</option>
          	<option value="SL">Sierra Leone</option>
          	<option value="SG">Singapore</option>
          	<option value="SX">Sint Maarten (Dutch part)</option>
          	<option value="SK">Slovakia</option>
          	<option value="SI">Slovenia</option>
          	<option value="SB">Solomon Islands</option>
          	<option value="SO">Somalia</option>
          	<option value="ZA">South Africa</option>
          	<option value="GS">South Georgia and the South Sandwich Islands</option>
          	<option value="SS">South Sudan</option>
          	<option value="ES">Spain</option>
          	<option value="LK">Sri Lanka</option>
          	<option value="SD">Sudan</option>
          	<option value="SR">Suriname</option>
          	<option value="SJ">Svalbard and Jan Mayen</option>
          	<option value="SZ">Swaziland</option>
          	<option value="SE">Sweden</option>
          	<option value="CH">Switzerland</option>
          	<option value="SY">Syrian Arab Republic</option>
          	<option value="TW">Taiwan, Province of China</option>
          	<option value="TJ">Tajikistan</option>
          	<option value="TZ">Tanzania, United Republic of</option>
          	<option value="TH">Thailand</option>
          	<option value="TL">Timor-Leste</option>
          	<option value="TG">Togo</option>
          	<option value="TK">Tokelau</option>
          	<option value="TO">Tonga</option>
          	<option value="TT">Trinidad and Tobago</option>
          	<option value="TN">Tunisia</option>
          	<option value="TR">Turkey</option>
          	<option value="TM">Turkmenistan</option>
          	<option value="TC">Turks and Caicos Islands</option>
          	<option value="TV">Tuvalu</option>
          	<option value="UG">Uganda</option>
          	<option value="UA">Ukraine</option>
          	<option value="AE">United Arab Emirates</option>
          	<option value="GB">United Kingdom</option>
          	<option value="US">United States</option>
          	<option value="UM">United States Minor Outlying Islands</option>
          	<option value="UY">Uruguay</option>
          	<option value="UZ">Uzbekistan</option>
          	<option value="VU">Vanuatu</option>
          	<option value="VE">Venezuela, Bolivarian Republic of</option>
          	<option value="VN">Viet Nam</option>
          	<option value="VG">Virgin Islands, British</option>
          	<option value="VI">Virgin Islands, U.S.</option>
          	<option value="WF">Wallis and Futuna</option>
          	<option value="EH">Western Sahara</option>
          	<option value="YE">Yemen</option>
          	<option value="ZM">Zambia</option>
          	<option value="ZW">Zimbabwe</option>
              </select>


          <label for="form-nok-navn">Nærmeste pårørendes navn</label>
          <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" name="nok-navn" placeholder="Påførendes navn" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <label class="control-label" for="selectbasic">Nærmeste pårørendes relasjon</label>
          <select id="selectbasic" name="nok-relasjon" class="form-control" required>
  				  <option value="forelder">Forelder</option>
  				  <option value="ektefelle">Ektefelle</option>
  				  <option value="samboer">Samboer</option>
  				  <option value="kjareste">Kjæreste</option>
  				  <option value="sosken">Søsken</option>
  				  <option value="annet">Annet</option>
	        </select>

          <label for="form-nok-telefon">Nærmeste pårørendes telefonnummer</label>
          <input type="text" pattern="^[0-9\-\+]{8,15}$" class="form-control" name="nok-telefon" placeholder="Pårørendes telefonnummer" required="true" autocomplete="off">
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

          <div class="form-group-biarbeidsgiver">
            <label class="control-label" for="radios">Er Canon biarbeidsgiver?</label>
            <div class="radio">
              <label>
              <input type="radio" name="biarbeidsgiver" value="ja" required>Ja</label>
            </div>
            <div class="radio">
              <label>
              <input type="radio" name="biarbeidsgiver" value="nei" required>Nei</label>
            </div>
          </div>
      </fieldset>
      <fieldset>


        <legend id="tilleggsopplysninger">Tilleggsopplysninger</legend>
        <hr />


        <label class="control-label" for="selectbasic">Skostørrelse</label>
        <select id="selectbasic" name="sko" class="form-control">
				  <option value="34">34</option>
				  <option value="35">35</option>
				  <option value="36">36</option>
				  <option value="37">37</option>
				  <option value="38">38</option>
				  <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
          <option value="45">45</option>
          <option value="46">46</option>
          <option value="47">47</option>
          <option value="48">48</option>
        </select>

        <label class="control-label" for="selectbasic">T-skjorte</label>
        <select id="selectbasic" name="tskjorte" class="form-control" >
  			  <option value="xs">XS</option>
  			  <option value="s">S</option>
  			  <option value="m">M</option>
  			  <option value="l">L</option>
  			  <option value="xl">XL</option>
  			  <option value="xxl">XXL</option>
        </select>

        <label class="control-label" for="selectbasic">Genser</label>
        <select id="selectbasic" name="genser" class="form-control" >
          <option value="xs">XS</option>
          <option value="s">S</option>
          <option value="m">M</option>
          <option value="l">L</option>
          <option value="xl">XL</option>
          <option value="xxl">XXL</option>
        </select>

        <label class="control-label" for="selectbasic">Jakke</label>
        <select id="selectbasic" name="jakke" class="form-control" >
          <option value="xs">XS</option>
          <option value="s">S</option>
          <option value="m">M</option>
          <option value="l">L</option>
          <option value="xl">XL</option>
          <option value="xxl">XXL</option>
        </select>
        <label class="control-label" for="selectbasic">Bukse</label>
        <select id="selectbasic" name="bukse" class="form-control" >
          <option value="xs">XS</option>
          <option value="s">S</option>
          <option value="m">M</option>
          <option value="l">L</option>
          <option value="xl">XL</option>
          <option value="xxl">XXL</option>
        </select>



        <div class="form-group">
          <label class="control-label" for="radios">Disponerer du bil?</label>
          <div class="radio">
            <label>
            <input type="radio" name="firmabil" value="ja" >Ja</label>
          </div>
          <div class="radio">
            <label>
            <input type="radio" name="firmabil" value="nei" >Nei</label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label" for="radios">Vil du overføre privat mobilnummer til bedrift?</label>
          <div class="radio">
            <label>
            <input type="radio" name="mobilabo" value="ja" >Ja</label>
          </div>
          <div class="radio">
            <label>
            <input type="radio" name="mobilabo" value="nei" >Nei (Nytt nummer opprettes)</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="radios">Foretrukket datamaskin?</label>
          <div class="radio">
            <label>
            <input type="radio" name="pc" value="pc" required>PC</label>
          </div>
          <div class="radio">
            <label>
            <input type="radio" name="pc" value="mac" required>Mac</label>
          </div>
        </div>
        <button id="submitForm" name="submit" type="submit" value="submit"> Registrer</button>
        </form>
      </fieldset>
    </div>
  </div>
</body>

</html>

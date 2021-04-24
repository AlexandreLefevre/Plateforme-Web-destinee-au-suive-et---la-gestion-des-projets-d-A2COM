<html>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="styles/tableau.css"/>
  <link rel="stylesheet" href="styles/header.css">

<a data-target="#myModal" role="button" class="btn btn-primary" data-toggle="modal">
  Launch demo modal</a>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Fiche Détaillées</h4>
      </div>
      <div class="modal-body">
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape1" id="etape1">
            Premier acompte
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape2" id="etape2">
            Template validé
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape3" id="etape3">
            Logo
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape4" id="etape4">
            Couleurs
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape5" id="etape5">
            Structure
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape6" id="etape6">
            Informations de contact
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape7" id="etape7">
            Texte de la page d'accueil validé
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape8" id="etape8">
            Photos pour E1/3
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape9" id="etape9">
            Personnalisation du Template
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape10" id="etape10">
            Création de page d'accueil
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape11" id="etape11">
            Création d'une page intérieure
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape12" id="etape12">
            E1/3 Validation interne
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape13" id="etape13">
            E1/3 Corrections internes
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape14" id="etape14">
            E1/3 Corrections du client
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape15" id="etape15">
            E1/3 Validation par client
          </label>
        </div>
          <div class="col-4">
          <label>
            <input type="checkbox" value="" name="etape16" id="etape16">
            Deuxième acompte (50%) payé
          </label>
        </div>
          <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape17" id="etape17">
            Création de texte
          </label>
        </div>
          <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape18" id="etape18">
            Validation du contenu par le client
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape19" id="etape19">
            Toutes les matières reçues
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape20" id="etape20">
            Réalisation du E2/3
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape21" id="etape21">
            Checkup interne du E2/3
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape22" id="etape22">
            Corrections internes pour E2/3 
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape23" id="etape23">
            Présentation au client 
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape24" id="etape24">
            Troisième acompte (75%) payé 
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape25" id="etape25">
            Deuxième tour de corrections 
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape26" id="etape26">
            Validation finale par le client 
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape27" id="etape27">
            Migration et SSL 
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="" name="etape28" id="etape28">
            Vérification finale après la migration
          </label>
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" name="close" id="close" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>
</html>
<script>
$('#myModal').on('hidden.bs.modal', function(e) {
  $("#myModal .modal-body").find('input:radio, input:checkbox').prop('checked', false);
})
</script>
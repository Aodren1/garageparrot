<?php
session_start();

if ($_SESSION['garage'] == true) {
    include 'head.php';

    // include('function_timer.php');
    // if (!isset($_SESSION['timer'])) {
    //     setTimer();
    // }
    // ;
    // timer();
    if (isset($_POST['delete'])) {
        $id_user_edit = $_POST['user_id'];
        include('function_delete_users.php');
        delUser($id_user_edit);
$msg = "<script> Alert.alert_info('Utilisateur supprimé'); </script>";
        unset($_POST['delete']);
    } elseif (isset($_POST['edit'])) {
        $_SESSION['user_id_edit'] = $_POST['user_id'];
        $user_id = $_POST['user_id'];
        $_SESSION['edit_link'] = 'management.php';
        unset($_POST['user_id']);
        echo '<script>window.location.href = "edit_user.php?id='.$user_id.'";</script>';
    } else { ?> <script>console.log('error post'); </script> <?php }
    ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Employés | Administrateurs</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

</head>

<body>
    <!-- NAVIGATION -->
    <?php  include('header.php') ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>

        <!-- MIDDLE -->
        <section class="middle p-4 card-management card-responsive">
            <div class="header header-management">
            <?php if(isset($msg)) echo $msg ?>

                <h1 style="font-size:x-large" id="gestion" class="pt-4 pb-3 pl-4 pr-4  informations-title" ><span  class="mr-2 material-symbols-sharp">supervisor_account</span> Gestion des Utilisateurs</h1>
    <div class="div-redirect-create-user"><a href="create_user.php"><button class=" btn input-create-user btn btn-primary" id='create_user' value=''><span class="mr-2 material-symbols-outlined">person_add</span> Créer un Utilisateur</button></a></div>
            </div>
            <div class="admin-user table-responsive">
                <table id="userTable" class="table ">
                    <thead class="">
                        <tr class="border-th">
                            
                            <th  data-col="0">Nom <span  class="btn-sort" data-col="0"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/></svg></span></th>
                            <th data-col="1">Prénom <span class="btn-sort" data-col="1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/></svg></span></th>
                            <th data-col="2">Email <span class="btn-sort" data-col="2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/></svg></span></th>
                           <th></th>
                        </tr>
                    </thead>
                    <tbody class="pt-3">
                        <tr >
                            <td style="height: 5px!important;"></td>
                            <td style="height: 5px!important;"></td>
                            <td style="height: 5px!important;"></td>
                            <td style="height: 5px!important;"></td>
                        </tr>
                        <?php

    include_once('function_connect.php');

    $stmt = $sql->prepare("SELECT * FROM users where role = 'employee'");
    $stmt->execute();
    $users = $stmt->fetchAll();
    foreach ($users as $user) {
                        ?>
                         <tr class="tr-hov">
                             <td class="semi-bold"><?php echo $user['lastname']; ?></td>
                             <td> <?php echo $user['firstname']; ?></td>
                             <td> <?php echo $user['email']; ?></td>
                             <!-- BTN EDIT -->
                             
                             <td style="display:flex; border:none; justify-content:space-around">                             <form name="edit" id="edit" method="post">
                             <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                              <button id="" type="submit" name="edit" class="btn btn-edit">Modifier</button>
                             </form>
                             <!-- BTN DELETE -->

                             
                                <div class="action-btn">

                             <button id="btn-del-modal" value="<?php echo $user['id']; ?>" onclick=" getFormId(this); msgContent(this)" data-value="<?php echo $user['firstname'] . " " . $user['lastname']; ?>" data-bs-toggle="modal" data-bs-target="#confirmationModal" type="button" name="delete" class="btn btn-del primary">Supprimer</button>
                             <form name="delete" data-value="<?php echo $user['id']; ?>" id="<?php echo $user['id']; ?>" action="" method="post">
                                 <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                 <input type="hidden" name="delete" value="">
                             </form></div>
                                 </div>
                             </td>
                         </tr>

                         <script>
  function submitForm(element) {
    var idValue = element.getAttribute('data-value');
    // Soumettre le formulaire spécifié par l'ID
    $('#' + idValue).submit();
  }
</script> 
                         <script>
function getFormId(element) {
    var btnId = element.getAttribute('value');
    document.getElementById('btn-confirm-delete').setAttribute('data-value', btnId);

}
 function msgContent(element) {

  var valeurBtn = element.getAttribute('data-value');
  document.getElementById('msg-del-content').textContent = "Si vous faîtes celà, " + valeurBtn + " sera définitivement retiré de l'entreprise.";

};
</script>

                         <div class="modal fade" tabindex="-1" role="dialog" id="confirmationModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-del">
                            <div class="modal-body p-3">
                                <h2><b>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</b></h2>
                                <p id="msg-del-content">Si vous faîtes celà, cet utilisateur sera définitivement retiré de l'entreprise.</p>
                                <div class="div-button">
                                <button type="button" onclick="closeModal()" id="button1" class="btn btn-outline-primary" data-dismiss="modal">Non, conserver</button>
                                <button id="btn-confirm-delete" type="submit" class="btn btn-primary" onclick="submitForm(this)">Oui, supprimer</button>
                                </div>
                            </div>

                                
                            </div>
                        </div>
                        </div> 
                         <?php }
?>
                       </tbody>
                </table>
            <!-- END LIST ADMIN -->
        </section>
        <!-- END MIDDLE -->
        <div class="btn-back"><button><a style="color:var(--color-white);" href="compagny_index.php">Revenir à l'accueil</a></button></div>

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
   
    <script>

$(document).ready(function () {
    var table = $('#userTable').DataTable({
        language: {
            "sEmptyTable": "Aucune donnée disponible dans le tableau",
            "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            "sInfoEmpty": "Affichage de 0 à 0 sur 0 entrées",
            "sInfoFiltered": "(filtré à partir de _MAX_ entrées au total)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Afficher _MENU_ entrées",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "sZeroRecords": "Aucun résultat trouvé",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                    "_": "%d lignes sélectionnées",
                    "0": "Aucune ligne sélectionnée",
                    "1": "1 ligne sélectionnée"
                }
            }
        },
        paging: false,
        info: false,
        ordering: true,
    });
    
});


</script>
  
</body>

</html>
<?php } else
    header('Location: login.php');
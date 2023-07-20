<!-- La sidebar du workspace -->

        <!-- SIDEBAR USER -->
<div style="display: <?php echo $status_sidebar2 ?> "class="sidebar fixed">
            <a href="<?php echo $link ?>" class="<?php echo $status_welcome ?>">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h4>Accueil</h4>
                </a>
                    
                                        <a href="messagerie.php" class="<?php echo $status_messagerie ?>">
                    <span class="material-symbols-sharp">mail</span>
                    <h4>Messagerie<?php if(isset($_SESSION['new_message'] )) {  ?><div class="notif-holidays"></div><?php } ?></h4>
                </a>
                <a class="<?php echo $status_document ?>"  href="documents_user.php">
                                    <span class="material-symbols-sharp">description</span>
                                    <h4>Documents</h4>
                                </a>
                <a class="<?php echo $status_journal ?>"  href="https://contactmedia.badgeuse.app/<?php if ($_SESSION['badgeuse_role'] == 1000) echo 'admin/' ?>journal-entreprise.php">
                <span class="material-symbols-sharp">menu_book</span>
                <h4>Journal d'Entreprise</h4>
            </a>
            <a class="account-sidebar" style="<?php if(isset($status_account_mobile)) echo $status_account_mobile; ?>" href="account.php">
                   
                   <span class="material-symbols-sharp">person</span><h4>Mon compte</h4>
              </a>
                <?php if (isset($link7)) { ?>
                <a class="<?php echo $status_account?>" style="" href="<?php echo $link7 ?>">
                    <span class="material-symbols-sharp">manage_accounts</span>
                    <h4>Mon compte</h4>
                </a>
                <?php } ?>
                </div>


        <!-- SIDEBAR ADMIN -->
            <div style="display: <?php echo $status_sidebar ?>;" class="sidebar fixed">
                <a href="<?php echo $link ?>" class="<?php echo $status_welcome ?>">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h4>Accueil</h4>
                </a>
                <a href="messagerie.php" class="<?php echo $status_messagerie ?>">
                    <span class="material-symbols-sharp">mail</span>
                    <h4>Messagerie<?php if(isset($_SESSION['new_message'] )) {  ?><div class="notif-holidays"></div><?php } ?></h4>
                </a>
                <a class="<?php echo $status_admin ?>" style="display: <?php echo $status_sidebar_admin ?> ;" href="<?php echo $link3 ?>">
                    <span class="material-symbols-sharp">admin_panel_settings</span>
                    <h4>Administrateurs</h4>
                </a>
                <a class="<?php echo $status_user ?>" href="<?php echo $link2 ?>">
                    <span class="material-symbols-sharp">supervisor_account</span>
                    <h4>Utilisateurs</h4>
                </a>
                <?php if ($_SESSION['garage_role'] == 1000) {
                                    ?><a class="<?php echo $status_schedule ?>"  href="planning.php">
                                    <span class="material-symbols-sharp">calendar_month</span>
                                    <h4>Planning</h4>
                                </a>
                                <a class="<?php echo $status_primes ?>"  href="primes.php">
                                    <span class="material-symbols-sharp">euro_symbol</span>
                                    <h4>Prime</h4>
                                </a>
                                <a class="<?php echo $status_archives ?>"  href="archives.php">
                                    <span class="material-symbols-sharp">inventory_2</span>
                                    <h4>Archives</h4>
                                </a>
                                <a class="<?php echo $status_holidays ?>"  href="holidays.php">
                                    <span class="material-symbols-sharp">date_range</span>
                                    <h4>Planning Congés</h4>
                                </a>
                                <a class="<?php echo $status_holidays_requests ?>"  href="requests_holidays.php">
                                    <span class="material-symbols-sharp">free_cancellation</span>
                                    <h4>Demande de Congés<?php if(isset($_SESSION['new_holidays_request'] )) {  ?><div class="notif-holidays"></div><?php } ?></h4>
                                </a>
                                <a class="<?php echo $status_document ?>"  href="documents.php">
                                    <span class="material-symbols-sharp">description</span>
                                    <h4>Documents</h4>
                                </a>
                                <a class="<?php echo $status_journal ?>"  href="conn_badgeuse.php?j=1">
                <span class="material-symbols-sharp">menu_book</span>
                <h4>Journal d'Entreprise</h4>
            </a>
            <a class="account-sidebar" style="<?php if(isset($status_account_mobile)) echo $status_account_mobile; ?>" href="account.php">
                   
                     <span class="material-symbols-sharp">person</span><h4>Mon compte</h4>
                </a>
                                <?php
                } ?> 
                
                <?php if (isset($link7)) { ?>
                <a class="<?php echo $status_account ?>" style="" href="<?php echo $link7 ?>">
                   
                     <span class="material-symbols-sharp">person</span><h4>Mon compte</h4>
                </a>
                <?php } ?>
                
            </div>

            
            
            

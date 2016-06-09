<?php foreach($liste as $p) :
	$p = checkStringIntegrity($p); ?>
                <!-- Comment -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading"><?=$p['pseudo']?>
                            <small><?=affiche_date_mysql($p['date'])?></small>
                        </h4>
                        <?=$p['contenu']?>
                    </div>
                </div>
<?php endforeach; ?>
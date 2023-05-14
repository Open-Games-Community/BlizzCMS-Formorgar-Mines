   
   <aside id="right">
	<div class="ornament-bar"></div>
					<div id="content_ajax" style="max-width:734px">
	<article style="max-width:705px">
	<section class="body" style="width:705px">
            <?php if ($this->wowmodule->getNewsStatus()): ?>
            <div class="uk-grid uk-grid-small uk-grid-match uk-child-width-1-1" data-uk-grid>
              <?php foreach ($NewsList as $news): ?>
              <div>
                <a href="<?= base_url('news/'.$news->id) ;?>" title="<?= $this->lang->line('button_read_more'); ?>">
                  <div class="uk-card uk-card-default news-card uk-card-hover uk-grid-collapse uk-margin" uk-grid>
                    <div class="uk-width-1-4@s uk-card-media-left uk-cover-container">
                      <img src="<?= base_url('assets/images/news/'.$news->image); ?>" alt="<?= $news->title ?>" uk-cover>
                      <canvas width="500" height="250"></canvas>
                    </div>
                    <div class="uk-width-2-3@s uk-card-body">
                      <h5 class="top"><?= $news->title ?></h5>
                      <p class="uk-text-small uk-margin-small"><?= mb_substr(ucfirst(strtolower(strip_tags($news->description))), 0, 160, "UTF-8").' ...'; ?></p>
                      <p class="uk-text-small uk-margin-remove uk-text-right"><i class="far fa-comment-alt"></i> <?= $this->news_model->getCommentCount($news->id); ?> <?= $this->lang->line('news_comments'); ?></p>
                    </div>
                  </div>
                </a>
              </div>
              <?php endforeach ?>
            </div>
            <?php endif ?>
         </section>
		  </article> </div>
		  <article>
          <section class="body">
								<section id="update_status"> <div class="realm">
            <?php if($this->wowmodule->getRealmStatus()): ?>
            <h4 class="uk-h4 uk-text-bold" style="color:white"><i class="fas fa-server fa-sm"></i> <?= $this->lang->line('home_server_status'); ?></h4>
            <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-margin-small" data-uk-grid>
              <?php foreach ($realmsList as $charsMultiRealm): 
                $multiRealm = $this->wowrealm->getRealmConnectionData($charsMultiRealm->id);
              ?>
              <div>
                <div class="uk-card uk-card-default uk-card-body card-status">
                  <div class="uk-grid uk-grid-small" data-uk-grid>
                    <div class="uk-width-expand">
                      <h5 class="uk-h5 uk-text-bold uk-margin-small"><a href="<?= base_url('online'); ?>" class="uk-link-reset"><i class="fas fa-server"></i> <?= $this->lang->line('table_header_realm'); ?> <?= $this->wowrealm->getRealmName($charsMultiRealm->realmID); ?></a></h5>
                    </div>
                    <div class="uk-width-auto">
                      <?php if ($this->wowrealm->RealmStatus($charsMultiRealm->realmID, $this->wowrealm->realmGetHostname($charsMultiRealm->realmID))): ?>
                        <div class="status-dot online" uk-tooltip="<?= $this->lang->line('online'); ?>"><span><span></span></span></div>
                      <?php else: ?>
                        <div class="status-dot offline" uk-tooltip="<?= $this->lang->line('offline'); ?>"><span><span></span></span></div>
                      <?php endif ?>
                    </div>
                  </div>
                  <?php if ($this->wowrealm->RealmStatus($charsMultiRealm->realmID, $this->wowrealm->realmGetHostname($charsMultiRealm->realmID))): ?>
                  <div class="uk-grid uk-grid-collapse uk-margin-small" data-uk-grid>
                    <div class="uk-width-1-2">
                      <div class="uk-tile alliance-bar uk-text-center" uk-tooltip="<?= $this->lang->line('faction_alliance'); ?>">
                        <i class="fas fa-users"></i>
                        <?= $this->wowrealm->getCharactersOnlineAlliance($multiRealm); ?>
                      </div>
                    </div>
                    <div class="uk-width-1-2">
                      <div class="uk-tile horde-bar uk-text-center" uk-tooltip="<?= $this->lang->line('faction_horde'); ?>">
                        <i class="fas fa-users"></i>
                        <?= $this->wowrealm->getCharactersOnlineHorde($multiRealm); ?>
                      </div>
                    </div>
                  </div>
                  <?php else: ?>
                  <p class="uk-text-small uk-margin-small"><i class="fas fa-exclamation-circle"></i> <?= $this->lang->line('home_realm_info'); ?> <span class="uk-text-danger uk-text-bold uk-text-uppercase" ><?= $this->lang->line('offline'); ?></span></p>
                  <?php endif ?>
                </div>
              </div>
              <?php endforeach ?>
            </div>
            <h5 class="uk-h5 uk-text-center uk-margin " style="color:white">
              <?php if ($this->wowgeneral->getExpansionAction() == 1): ?>
              <i class="fas fa-gamepad"></i> Set Realmlist <?= $this->config->item('realmlist'); ?>
              <?php else: ?>
              <i class="fas fa-gamepad"></i> Set Portal "<?= $this->config->item('realmlist'); ?>"
              <?php endif ?>
            </h5>
            <?php endif ?>
			
			</div>
			</section>
			
	</section>
</aside>
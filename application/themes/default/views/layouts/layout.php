<!DOCTYPE html>
<html>
  <head>
    <title><?= $this->config->item('website_name'); ?> - <?= $pagetitle ?></title>
    <?= $template['metadata']; ?>
    <link rel="icon" type="image/x-icon" href="<?= $template['location'].'assets/images/favicon.ico'; ?>" />  
    <link rel="stylesheet" href="<?= $template['location'].'assets/css/main.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['location'].'assets/css/sev.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['location'].'assets/css/cms.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['location'].'assets/css/news.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['location'].'assets/css/default.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['assets'].'core/uikit/css/uikit.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['assets'].'core/uikit/css/uikit.min.css'; ?>" />
	<script type="text/javascript" href="<?= $template['location'].'assets/css/router.js'; ?>" /></script>
	<script type="text/javascript" href="<?= $template['location'].'assets/css/require.js'; ?>" /></script>
	<script type="text/javascript" href="<?= $template['location'].'assets/css/mJ1gbJLnMJjaUVGgfqPsiRpJOvQ.js'; ?>" /></script>
	<script src="<?= $template['assets'].'core/uikit/js/uikit.min.js'; ?>"></script>
    <script src="<?= $template['assets'].'core/uikit/js/uikit-icons.min.js'; ?>"></script>
	<script type="text/javascript">var isIE = false;</script>
	
  </head>
  <body>
  <section id="wrapper">
  <a id="server-logo" href="<?= base_url('en'); ?>" title=""></a>
    <ul id="top_menu">
	
              <?php if (!$this->wowauth->isLogged()): ?>
              <?php if($this->wowmodule->getRegisterStatus() == '1'): ?>
              <li class="uk-visible@m"><a href="<?= base_url('register'); ?>"><i class="fas fa-user-plus"></i>&nbsp;<?= $this->lang->line('button_register'); ?></a></li>
              <?php endif; ?>
              <?php if($this->wowmodule->getLoginStatus() == '1'): ?>
              <li class="uk-visible@m"><a href="<?= base_url('login'); ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;<?= $this->lang->line('button_login'); ?></a></li>
              <?php endif; ?>
              <?php endif; ?>
              <?php if ($this->wowauth->isLogged()): ?>
			  
              <li class="uk-visible@m">
                <a href="#">
                  <?php if($this->wowgeneral->getUserInfoGeneral($this->session->userdata('wow_sess_id'))->num_rows()): ?>
                  <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/'.$this->wowauth->getNameAvatar($this->wowauth->getImageProfile($this->session->userdata('wow_sess_id')))); ?>" width="30" height="30" alt="Avatar">
                  <?php else: ?>
                  <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="30" height="30" alt="Avatar">
                  <?php endif; ?>
                  <span class="uk-text-right uk-text-bold">&nbsp;<?= $this->session->userdata('blizz_sess_username'); ?>&nbsp;</span>
                </a>
               
                  <ul class="uk-nav uk-navbar-dropdown-nav">
				  <table>
                    <?php if ($this->wowauth->isLogged()): ?>
                    <?php if($this->wowmodule->getUCPStatus() == '1'): ?>
                    <td><li><a href="<?= base_url('panel'); ?>"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></a></li></td>
                    <?php endif; ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('mod_access_level')): ?>
                  <td>  <li><a href="<?= base_url('mod'); ?>"><i class="fas fa-gavel"></i> <?= $this->lang->line('button_mod_panel'); ?></a></li></td>
                    <?php endif; ?>
                    <?php if($this->wowmodule->getACPStatus() == '1'): ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('admin_access_level')): ?>
                  <td>  <li><a href="<?= base_url('admin'); ?>"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a></li></td>
                    <?php endif; ?>
                    <?php endif; ?>
                   <td> <li><a href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a></li></td>
                    <?php endif; ?></table>
                  </ul>
                
              </li>
              
              <?php endif; ?>
            </ul>
          
		<div id="main">
				<aside id="left">
					<article>
						<ul id="left_menu">
              <?php foreach ($this->wowgeneral->getMenu()->result() as $menulist): ?>
              <?php if($menulist->main == '2'): ?>
              <li class="uk-visible@m">
                <a href="#">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>&nbsp;
                </a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <?php foreach ($this->wowgeneral->getMenuChild($menulist->id)->result() as $menuchildlist): ?>
                      <li>
                        <?php if($menuchildlist->type == '1'): ?>
                        <a href="<?= base_url($menuchildlist->url); ?>">
                          <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                        </a>
                        <?php elseif($menuchildlist->type == '2'): ?>
                        <a target="_blank" href="<?= $menuchildlist->url ?>">
                          <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                        </a>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </li>
              <?php elseif($menulist->main == '1' && $menulist->child == '0'): ?>
              <li class="uk-visible@m">
                <?php if($menulist->type == '1'): ?>
                <a href="<?= base_url($menulist->url); ?>">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                </a>
                <?php elseif($menulist->type == '2'): ?>
                <a target="_blank" href="<?= $menulist->url ?>">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                </a>
                <?php endif; ?>
              </li>
              <?php endif; ?>
              <?php endforeach; ?>
            </ul>
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#mobile" uk-toggle></a>
          
		  </article>
          <article>
            <?php if ($this->wowauth->isLogged()): ?>
           <section class="body">
              <ul class="uk-subnav uk-subnav-divider subnav-points">
                <li><span uk-tooltip="title:<?=$this->lang->line('panel_dp'); ?>;pos: bottom"><i class="dp-icon"></i></span> <?= $this->wowgeneral->getCharDPTotal($this->session->userdata('wow_sess_id')); ?></li>
                <li><span uk-tooltip="title:<?=$this->lang->line('panel_vp'); ?>;pos: bottom"><i class="vp-icon"></i></span> <?= $this->wowgeneral->getCharVPTotal($this->session->userdata('wow_sess_id')); ?></li>
             <li> <a href="<?= base_url('cart'); ?>"><i class="fas fa-shopping-cart"></i>&nbsp;<span class="uk-badge"><?= $this->cart->total_items() ?></span></a></li><li>
                
                    <?php if($this->cart->total_items() > 0): ?>
                    
                    <?php else: ?>
					
                    <?php endif; ?></li>
			  </ul>
           </section>
            <?php endif; ?>
         </article>
		 <article>
							<h1 class="top"><p>User area</p></h1>
							<section class="body">
							 <?php if (!$this->wowauth->isLogged()): ?>
							 <?php if($this->wowmodule->getLoginStatus() == '1'): ?>
								<form action="<?= base_url('en/login'); ?>" method="post" accept-charset="utf-8"><div style="display:none">
<input type="hidden" name="csrf_token_name" value="731295226e629b081b9a7c53052e4dd5" />
</div>
	<div id="sidebox_login" style="text-align: center;">
		<input type="text" name="username" id="login_username" autocomplete="username" value="" placeholder="Username">
		<input type="password" name="password" id="login_password" autocomplete="current-password" value="" placeholder="Password">
		<input type="submit" id="button_login" value="Login">
		<br><br> <a href="<?= base_url('en/register'); ?>">Register an Account</a>
	</div>
</form>
<?php endif; ?>
<?php endif; ?>

				  <center>
                    <?php if ($this->wowauth->isLogged()): ?>
                    <?php if($this->wowmodule->getUCPStatus() == '1'): ?>
                    <li style="font-size:15px"><a href="<?= base_url('panel'); ?>"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></a></li>
                    <?php endif; ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('mod_access_level')): ?>
                    <li style="font-size:15px"><a href="<?= base_url('mod'); ?>"><i class="fas fa-gavel"></i> <?= $this->lang->line('button_mod_panel'); ?></a></li>
                    <?php endif; ?>
                    <?php if($this->wowmodule->getACPStatus() == '1'): ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('admin_access_level')): ?>
                    <li style="font-size:15px"><a href="<?= base_url('admin'); ?>"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <li style="font-size:15px"><a href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a></li>
                    <?php endif; ?>
                  </center>
							</section>
						</article>
					<article>
							<h1 class="top"><p>Updates</p></h1>
							<section class="body">
								<div id="">
	
                        <img src="https://articles-images.sftcdn.net/wp-content/uploads/sites/9/2014/11/WoW-10-years-Characters-304x170.jpg" width="250px">
                    <div class="">
               <div class="">
                <p style="size:15px"> Patch v1.5.0 is here! </p> 
            </div>
               <img src="https://static1.millenium.org/articles/0/37/90/10/@/1491931-1447-amp_main_media_schema-1.jpg" width="250px">
            </div>
                    <div class="">
                <p> New Shop content! </p> 
            </div>               
			</div>
						</section>
						</article>
						<article>
							<h1 class="top"><p>Information</p></h1>
							<section class="body">
								<div id="">
	
                        <img src="https://static1.millenium.org/articles/8/37/90/08/@/1491906-dpp-article_list_m-1.jpg" width="250px">
                    <div class="">
               <div class="">
                <p style="size:15px"> New shop content! </p> 
            </div>
               <img src="https://www.logicalincrements.com/assets/img/articles/wow/settings/Shadow/shadowhigh.jpg" width="250px">
            </div>
                    <div class="">
                <p> New area available! </p> 
            </div>              
			</div>
						</section>
						</article>
						<article>
						<h1 class="top"><p>Links</p></h1>
						<section class="body">
						<div id="">
						<div class="uk-text-center">
          <a target="_blank" href="<?= $this->config->item('social_facebook'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-facebook-f"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_twitter'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_youtube'); ?>" class="uk-icon-button"><i class="fab fa-youtube"></i></a>
        </div>
		</div>
		</section>
		</article>                   
				</aside>   
	</aside>

    <?= $template['body']; ?>
	
<div class="clear"></div>
    <footer>
      <br>       
        <p class="uk-text-center uk-margin-small">Copyright <i class="far fa-copyright"></i> <?= date('Y'); ?> <span class="uk-text-bold"><?= $this->config->item('website_name'); ?></span>. <?= $this->lang->line('footer_rights'); ?> Layout Created by <a href="https://opengamescommunity.com">Alex</a>.</p>
        <p class="uk-text-small uk-margin-small uk-text-center" style="font-size:10px;">World of Warcraft® and Blizzard Entertainment® are all trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries. These terms and all related materials, logos, and images are copyright © Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment®.</p>    
    </footer>
	</div>
	</section>	
	<script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>

  new Crate({

    server: '839220655321120808',

    channel: '839220655321120810',

  })

</script>
	<style>
	.back-to-top {
  position: fixed;
  right: 5rem;
  bottom: 1.1rem;
  padding: 0.5rem;
  background:transparent;
  border: none;
  cursor: pointer;
  opacity: 100%;
  transition: opacity 0.5s;
}

.back-to-top:hover {
  opacity: 60%;
}

.hidden {
  opacity: 0%;
}

.back-to-top-icon {
  width: 1rem;
  height: 1rem;
  color: #7ac9f9;
}

.progress-bar {
  height: 0.3rem;
  background: orange;
  position: fixed;
  top: 0;
  left: 0;
}
</style>
<div class="progress-bar" />
<button class="back-to-top hidden">
  <img src="<?= $template['location'].'assets/images/upper.png'; ?>" style="width:50px"></img>
</button>
<div class="progress-bar" />

<script>
const showOnPx = 100;
const backToTopButton = document.querySelector(".back-to-top");
const pageProgressBar = document.querySelector(".progress-bar");

const scrollContainer = () => {
  return document.documentElement || document.body;
};

const goToTop = () => {
  document.body.scrollIntoView({
    behavior: "smooth"
  });
};

document.addEventListener("scroll", () => {
  console.log("Scroll Height: ", scrollContainer().scrollHeight);
  console.log("Client Height: ", scrollContainer().clientHeight);

  const scrolledPercentage =
    (scrollContainer().scrollTop /
      (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
    100;

  pageProgressBar.style.width = `${scrolledPercentage}%`;

  if (scrollContainer().scrollTop > showOnPx) {
    backToTopButton.classList.remove("hidden");
  } else {
    backToTopButton.classList.add("hidden");
  }
});

backToTopButton.addEventListener("click", goToTop);
</script>
  </body>
 
</html>

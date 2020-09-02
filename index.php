<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);


require_once("functions.php");
require_once("routes-ajax.php");
require_once("dashboard.php");
require_once("dashboard-persons.php");
require_once("dashboard-accounts.php");
require_once("dashboard-domains.php");
require_once("dashboard-templates.php");
require_once("dashboard-customstyle.php");
require_once("dashboard-menus.php");
require_once("dashboard-initialpages.php");
require_once("dashboard-wedding.php");
require_once("dashboard-consorts.php");
require_once("dashboard-parties.php");
require_once("dashboard-bestfriends.php");
require_once("dashboard-events.php");
require_once("dashboard-stakeholders.php");
require_once("dashboard-outerlists.php");
require_once("dashboard-albuns.php");
require_once("dashboard-rsvp.php");
require_once("dashboard-messages.php");
require_once("dashboard-videos.php");
require_once("dashboard-products.php");
require_once("dashboard-orders.php");
require_once("dashboard-banks.php");
require_once("dashboard-transfers.php");
require_once("dashboard-plans.php");
require_once("dashboard-plans-renewal.php");
require_once("dashboard-plans-upgrade.php");
require_once("dashboard-plans-purchase.php");
require_once("dashboard-tags.php");
require_once("dashboard-socialmedias.php");
require_once("dashboard-terms.php");
require_once("dashboard-guide.php");
require_once("dashboard-testimonials.php");
require_once("dashboard-support.php");
require_once("dashboard-garbage.php");
require_once("dashboard-leads.php");



require_once("site.php");
require_once("site-cart.php");
require_once("site-checkout.php");
require_once("site-login.php");
require_once("site-voucher.php");
require_once("site-webhooks.php");
require_once("site-pages.php");
require_once("site-search.php");
require_once("site-templates.php");
require_once("site-email.php");
require_once("site-leads.php");
require_once("site-promotions.php");


require_once("admin.php");
require_once("admin-coupons.php");
require_once("admin-discounts.php");
require_once("admin-maintenance.php");
require_once("admin-mailing.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-products.php");
require_once("admin-orders.php");


require_once("domain.php");
require_once("domain-store.php");
require_once("domain-cart.php");
require_once("domain-checkout.php");
//require_once("domain-order.php");
require_once("domain-rsvp.php");
require_once("domain-message.php");
require_once("domain-events.php");
require_once("domain-videos.php");
require_once("domain-album.php");
require_once("domain-bestfriends.php");
require_once("domain-wedding.php");
require_once("domain-party.php");
require_once("domain-stakeholders.php");
require_once("domain-outerlists.php");
require_once("domain-garbage.php");






	














# APP RUN
$app->run();


 ?>
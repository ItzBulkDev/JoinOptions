<?php

namespace JoinOptions;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\plugin\PluginManager;
use pocketmine\plugin\Plugin;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {
	
public $cfg;

public function onEnable(){
	$this->saveDefaultConfig();
	$this->getServer()->getPluginManager()->registerEvents($this,$this);
	$this->getLogger()->info(TextFormat::GREEN."[JoinOptions] I've been §aenabled!");
	$this->getLogger()->info(TextFormat::GREEN."[JoinOptions] I was created by ItzBulkDev");
	}
public function onDisable(){
	$this->saveDefaultConfig();
	$this->getLogger()->info(TextFormat::RED."[JoinOptions] I've been disabled!");	
	}
	
	public function onJoin(PlayerJoinEvent $event) {
	  $cfg = $this->getConfig();
	  $healthcheck = $cfg->get("Enable-Health-On-Join");
	  $health = $cfg->get("Set-Health-Amount");
	  $msg = $cfg->get("Join-PopUp-Message");
	  $msgcheck = $cfg->get("Enable-PopUp-Messages");
	  $player = $event->getPlayer();
	    if($health == true){
	      $player->setHealth($health);
	      $player->sendPopup("You Have Been Healed!");
	      	}
	        	if($msgcheck == true){
	          	$player->sendPopup($msg);
	          
}
	}
}
	    
